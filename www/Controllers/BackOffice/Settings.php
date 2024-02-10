<?php

namespace App\Controllers\BackOffice;

use App\Core\Utils;
use App\Models\Settings;
use App\Models\User;
use App\Core\View;
use Cassandra\Date;

class Settings
{
    public function getSettings($data): void
    {
        $setting = new Settings;
        $setting->getId();
        $pdo = new \PDO($dsn, DB_USER, DB_PASSWORD);
        $sql = "SELECT key FROM wisp_settings  ";
        print_r($setting)
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(); // Exécution de la requête préparée
        $result = $stmt->fetchColumn(); // Récupération du résultat
        $data['result'] = $result;
        print_r($data['result']);

        $myView = new View("BackOffice/Dashboard/settings", $data["template"], ["result" => $data["result"]]);
    }

    
   
}