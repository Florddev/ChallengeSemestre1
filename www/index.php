<?php

namespace App;
use App\Controllers\Error;

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
$uri = strlen($uri) > 1 ? rtrim($uri) : $uri; // nettoyer correctement l'uri des / a la fin de la ligne

// Récupérer le contenu du fichier routes.yaml
if (!file_exists("routes.yml")) {
    die("Le fichier routes.yaml n'existe pas");
    //TODO: A la place du die, renvoyer vers une page correspondante à l'erreur avec le code erreur correspondant
}

$listOfRoutes = yaml_parse_file("routes.yml");

//Créer une instance du bon controller
//et appeler la bonne action
//en effectuant toutes les vérifications nécessaires
if(!empty($listOfRoutes[$uri])){
    if(!empty($listOfRoutes[$uri]["controller"])){
        if(!empty($listOfRoutes[$uri]["action"])){

            $controller = $listOfRoutes[$uri]["controller"];
            $action = $listOfRoutes[$uri]["action"];

            if(file_exists("Controllers/".$controller.".php")){
                include "Controllers/".$controller.".php";
                $controller = "App\\Controllers\\".$controller;
                if(class_exists($controller)){
                    $objectController = new $controller(); // Instantiation dynamique
                    if(method_exists($objectController, $action)){
                        $objectController->$action();
                    } else die("L'action '".$action."' n'existe pas dans '".$controller."'");
                } else die("La class '".$controller."' n'existe pas");
            } else die("Le fichier '".$controller."' n'existe pas");
        } else die("La route ne contient pas d'action");
    } else die("La route ne contient pas de controller");
} else {
    require "Controllers/Error.php";
    $customError = new Error();
    $customError->page404();
}
