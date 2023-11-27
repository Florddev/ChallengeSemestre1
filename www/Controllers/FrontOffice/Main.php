<?php

namespace App\Controllers\FrontOffice;
use App\Core\View;
use App\Models\Category;
use App\Models\User;

class Main
{
    public function home($route): void
    {
        echo "<pre>";
        // Créer un nouvel objet et l'ajouter dans la bdd
        /*
        $myUser = new User();
        $myUser->setFirstname("YVEs");
        $myUser->setLastname("Skrzypczyk   ");
        $myUser->setEmail("Y.skrzypczyk@gmail.com");
        $myUser->setPwd("Test1234");
        $myUser->save();
        */

        // Récupérer une entrée existante de la BDD via son id
        /*
        $myUser = User::populate(1);
        $myUser->setLastname("titi");
        $myUser->save();
        */

        // Récupérer une entrée existante de la BDD via un ou plusieurs parametres

        $myUser2 = new User();
        $myUser2 = $myUser2->getOneBy(array("email"=>"Y.skrzypczyk@gmail.com"), "object");

        print_r($myUser2);

        /*
        $myUser = Category::populate(1);
        print_r($myUser);
        */
        echo "</pre>";

        /*
        try {
            // Instanciation de l'objet PDO
            $pdo = new \PDO("pgsql:host=db;dbname=blog;port=5432", "postgres", "password");

            // Requête simple sans prepared statements
            $resultats = $pdo->query("SELECT * FROM category;");

            // Récupération des résultats
            $resultatsArray = $resultats->fetchAll(\PDO::FETCH_ASSOC);

            // Affichage des résultats
            foreach ($resultatsArray as $row) {
                print_r($row);
            }
        } catch (\PDOException $e) {
            // Gestion des erreurs de connexion
            echo "Erreur de connexion : " . $e->getMessage();
        }
        */

        new View("FrontOffice/Main/home", $route["template"]);
    }

}