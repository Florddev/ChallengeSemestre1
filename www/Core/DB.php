<?php
namespace App\Core;

use App\Controllers\BackOffice\Installation;

class DB
{
    private ?object $pdo = null;
    private string $table;
    private const dbPrefix = "";

    public function __construct()
    {
        //connexion Ã  la bdd via pdo
        $inst = new Installation();

        try{
            $this->pdo = new \PDO($inst->getDsnFromDbType(DB_TYPE), DB_USER, DB_PASSWORD);
        }catch (\PDOException $e) {
            echo "Erreur SQL : ".$e->getMessage();
        }

        $table = get_called_class();
        $table = explode("\\", $table);
        $table = array_pop($table);
        $this->table = self::dbPrefix.strtolower($table);
    }

    public function getDataObject(): array
    {
        return array_diff_key(get_object_vars($this), get_class_vars(get_class()));
    }

    public function save()
    {
        $data = $this->getDataObject();

        foreach ($data as $key => $value) {
            if (is_bool($value)) {
                $data[$key] = $value ? 'true' : 'false';
            }
        }

        if(empty($this->getId())){
            $sql = 'INSERT INTO '. DB_PREFIX . strtolower($this->table) . ' (' . implode(',', array_keys($data)) . ') VALUES (:' . implode(',:', array_keys($data)) . ');';
        }else{
            $sql = "UPDATE " . DB_PREFIX . $this->table . " SET ";
            foreach ($data as $column => $value){
                $sql.= $column. "=:".$column. ",";
            }
            $sql = substr($sql, 0, -1);
            $sql.= " WHERE id = ".$this->getId().";";
        }

        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($data);
    }

    public function saveSetting(bool $insert = false)
    {
        $data = $this->getDataObject();

        if($insert){
            $sql = 'INSERT INTO '. DB_PREFIX . strtolower($this->table) . ' ("key", "value") VALUES ("'.$this->getKey().'", "'.$data["value"].'");';
        }else{
            $sql = "UPDATE ". DB_PREFIX . $this->table . " SET ";
            foreach ($data as $column => $value){
                $sql.= $column. "=:".$column. ",";
            }
            $sql = substr($sql, 0, -1);
            $sql.= " WHERE key = '".$this->getKey()."';";
        }

        echo $sql;

        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($data);
    }


    public static function populate(int $id): object
    {
        $class = get_called_class();
        $object = new $class();
        return $object->getOneBy(["id"=>$id], "object");
    }

    public static function getBy(array $data)
    {
        $class = get_called_class();
        $object = new $class();
        return $object->getOneBy($data, "object");
    }

    //$data = ["id"=>1] ou ["email"=>"y.skrzypczyk@gmail.com"]
    public function getOneBy(array $data, string $return = "array")
    {
        $sql = "SELECT * FROM ".DB_PREFIX.$this->table. " WHERE ";

        foreach ($data as $column=>$value){
            $sql .= " ".$column."=:".$column. " AND";
        }
        $sql = substr($sql, 0, -3);
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($data);

        if($return == "object"){
            $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        }

        return $queryPrepared->fetch();
    }


    public static function populateAllBy(array $data, string $return = "array"): array
    {
        $class = get_called_class();
        $object = new $class();
        return $object->getAllBy($data, $return);
    }

    //
    public function getAllBy(array $data, string $return = "array"): array
    {
        $sql = "SELECT * FROM " . DB_PREFIX . $this->table;
        $params = [];

        if(!empty($data) && count($data) > 0){
            $sql .= " WHERE ";
            foreach ($data as $column => $value) {
                if ($value === null) {
                    $sql .= " " . $column . " IS NULL AND";
                } else {
                    $sql .= " " . $column . "=:" . $column . " AND";
                    $params[$column] = $value;
                }
            }
            $sql = rtrim($sql, ' AND') . ";";
        }

        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($params);

        if ($return === "object") {
            $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        }

        return ($return === "object") ? $queryPrepared->fetchAll() : $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function countResponses(int $id): int
    {
        $sql = "SELECT COUNT(*) FROM " . DB_PREFIX . $this->table . " WHERE id_comment_response = :id AND valid = true";
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute(['id' => $id]);
        return $queryPrepared->fetchColumn();
    }

    public function countAll(): int
    {
        $sql = "SELECT COUNT(*) FROM " . DB_PREFIX . $this->table;
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute();
        return $queryPrepared->fetchColumn();
    }

    public function countAllValidatedUsers(): int
    {
        $sql = "SELECT COUNT(*) FROM " . DB_PREFIX . "user WHERE status = 2";
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute();
        return $queryPrepared->fetchColumn();
    }

    public function countAllUnvalidatedUsers(): int
    {
        $sql = "SELECT COUNT(*) FROM " . DB_PREFIX . "user WHERE status = 1";
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute();
        return $queryPrepared->fetchColumn();
    }

    public function countByLast12Months(): array
{
    $currentDate = new \DateTime();
    $currentMonth = $currentDate->format('n');
    $currentYear = $currentDate->format('Y');

    $counts = [];

    // Itérer sur les 12 derniers mois
    for ($i = 0; $i < 12; $i++) {
        $month = ($currentMonth - $i <= 0) ? 12 + ($currentMonth - $i) : $currentMonth - $i;
        $year = ($currentMonth - $i <= 0) ? $currentYear - 1 : $currentYear;

        $counts[$i] = $this->countByMonth($month, $year);
    }

    return $counts;
}


private function countByMonth($month, $year): int
{
    $startDate = "$year-$month-01";
    $endDate = date('Y-m-t', strtotime($startDate));

    $sql = "SELECT COUNT(*) FROM " . DB_PREFIX . $this->table . " WHERE created_at BETWEEN :startDate AND :endDate";
    $queryPrepared = $this->pdo->prepare($sql);
    $queryPrepared->bindParam(':startDate', $startDate);
    $queryPrepared->bindParam(':endDate', $endDate);
    $queryPrepared->execute();

    return $queryPrepared->fetchColumn();
}

    public function getAllByLike(array $data, string $return = "array"): array
{
    $sql = "SELECT * FROM " . DB_PREFIX . $this->table;

    if (!empty($data) && count($data) > 0) {
        $sql .= " WHERE ";
        foreach ($data as $column => $value) {
            // Utilisation de ILIKE pour une recherche insensible à la casse
            $sql .= " " . $column . " ILIKE :" . $column . " AND";
        }
        $sql = rtrim($sql, ' AND') . ";";
    }

    $queryPrepared = $this->pdo->prepare($sql);

    // Modification pour traiter correctement le joker %
    foreach ($data as $column => $value) {
        // Ajouter le joker % uniquement s'il n'est pas déjà présent
        $queryPrepared->bindValue(":$column", '%' . $value . '%');
    }

    $queryPrepared->execute();

    if ($return === "object") {
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
    }

    return ($return === "object") ? $queryPrepared->fetchAll() : $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
}


    public function getAll(string $return = "array"): array
    {
        $sql = "SELECT * FROM " . DB_PREFIX . $this->table;

        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute();

        if ($return === "object") {
            $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        }

        return ($return === "object") ? $queryPrepared->fetchAll() : $queryPrepared->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete(array $data): bool
    {
        if (!empty($data)) {
            $sql = "DELETE FROM " . DB_PREFIX . $this->table . " WHERE ";
            
            foreach ($data as $column => $value) {
                $sql .= "$column = :$column AND ";
            }
            $sql = rtrim($sql, ' AND ');
            
            $queryPrepared = $this->pdo->prepare($sql);
            if ($queryPrepared->execute($data)) {
                return true;
            }
        }
        return false;
    }
}