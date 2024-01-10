<?php

namespace App;
use App\Controllers\Error;
use App\Models\Pages;

spl_autoload_register("App\myAutoloader");

function myAutoloader(String $class): void
{
    //$class = App\Core\View
    $class = str_replace("App\\","", $class);
    //$class = Core\View
    $class = str_replace("\\","/", $class);
    //$class = Core/View
    if(file_exists($class.".php")){
        include $class.".php";
    }
}

//Comment récupérer et nettoyer l'URI
// Exemple on doit avoir "/", "/login", "/logout", ...
$uri = strtolower($_SERVER["REQUEST_URI"]); // Variable supper global
$uri = strtok($uri, "?");
$uri = strlen($uri) > 1 ? rtrim($uri, "/") : $uri; // nettoyer correctement l'uri des / a la fin de la ligne

// Récupérer le contenu du fichier routes.yaml
if (!file_exists("routes.yml")) {
    die("Le fichier routes.yaml n'existe pas");
    // TODO: A la place du die, renvoyer vers une page correspondante à l'erreur avec le code erreur correspondant
}

$listOfRoutes = yaml_parse_file("routes.yml");

// Créer une instance du bon controller, appel l'action associé et effectu toutes les vérifications nécessaires
if(!empty($listOfRoutes[$uri])){
    if(!empty($listOfRoutes[$uri]["controller"])){
        if(!empty($listOfRoutes[$uri]["action"])){

            $controller = $listOfRoutes[$uri]["controller"];
            $action = $listOfRoutes[$uri]["action"];

            if(file_exists("Controllers/".$controller.".php")){
                include "Controllers/".$controller.".php";
                $controller = str_replace("/","\\", $controller);
                $controller = "App\\Controllers\\".$controller;
                if(class_exists($controller)){
                    $objectController = new $controller(); // Instantiation dynamique
                    if(method_exists($objectController, $action)){
                        // Si "restricted" n'est pas précisé, alors il n'y a par defaut pas de restrictions.
                        if(empty($listOfRoutes[$uri]["restricted"])) $listOfRoutes[$uri]["restricted"] = false;

                        // Vérifier si la page est restreinte
                        if($listOfRoutes[$uri]["restricted"]){
                            // Si oui, vérifier qu'une une session est ouverte
                            // Si une session n'est pas ouverte, envoyer l'utilisateur à la page de connexion
                            if(!empty($_SESSION)){ // TODO: Vérifier cette ligne pour vérifier qu'une session est bien ouverte.
                                // TODO: Vérifier que l'utilisateur à bien le/les role(s) nécessaire(s) pour accéder à la page
                                die("Vous n'avez pas les droits pour accéder à cette page");
                            } else {
                                header("Location: /login");
                            }
                        }

                        if(empty($listOfRoutes[$uri]["template"])) $listOfRoutes[$uri]["template"] = "";
                        $objectController->$action($listOfRoutes[$uri]);

                    } else die("L'action '".$action."' n'existe pas dans '".$controller."'");
                } else die("La class '".$controller."' n'existe pas");
            } else die("Le fichier '".$controller."' n'existe pas");
        } else die("La route ne contient pas d'action");
    } else die("La route ne contient pas de controller");
} else {
    if($page = Pages::getBy(["url"=>$uri])){
        echo $page->getContent();
    } else {
        require "Controllers/Error.php";
        $customError = new Error();
        $customError->page404();
    }
}
