<?php

namespace App\Core;

use App\Controllers\BackOffice\Editor;
use App\Controllers\Error;
use App\Models\Pages;

class Routing
{
    private array $listOfRoutes;

    public function __construct()
    {
        // Récupérer le contenu du fichier routes.yaml
        if (!file_exists("routes.yml")) {
            die("Le fichier routes.yaml n'existe pas");
            // TODO: A la place du die, renvoyer vers une page correspondante à l'erreur avec le code erreur correspondant
        }

        $this->listOfRoutes = yaml_parse_file("routes.yml");
    }

    public function handleRequest(): void
    {
        // Comment récupérer et nettoyer l'URI
        $uri = strtolower($_SERVER["REQUEST_URI"]);
        $uri = strtok($uri, "?");
        $uri = strlen($uri) > 1 ? rtrim($uri, "/") : $uri;

        if (!empty($this->listOfRoutes[$uri])) {
            $this->dispatch($uri);
        } else {
            $this->handleCustomRedirections($uri);
        }
    }

    private function handleCustomRedirections(string $uri): void
    {
        // Check if page exists in Pages table
        if ($page = Pages::getBy(["url" => $uri])) {
            $builder = new Editor();
            $builder->displayPage($page->getId());
        } elseif (str_starts_with($uri, "/dashboard/builder/")) {
            $this->handleDashboardBuilderRedirection($uri);
        } else {
        }
    }

    private function handleDashboardBuilderRedirection(string $uri): void
    {
        $pages = Pages::populateAllBy([]);
        $pageFound = null;

        foreach ($pages as $page) {
            $title = str_replace(" ", "-", strtolower($page["title"]));
            if ("/dashboard/builder/" . $title === $uri) {
                $pageFound = $page;
                break;
            }
        }

        if ($pageFound !== null) {
            $builder = new Editor();
            $builder->pageBuilder($pageFound);
        } else {
            require "Controllers/Error.php";
            $errorsManager = new Error();
            $errorsManager->page404();
        }
    }


    private function dispatch(string $uri): void
    {
        $controller = $this->listOfRoutes[$uri]["controller"];
        $action = $this->listOfRoutes[$uri]["action"];

        if (file_exists("Controllers/" . $controller . ".php")) {
            include "Controllers/" . $controller . ".php";
            $controller = str_replace("/", "\\", $controller);
            $controller = "App\\Controllers\\" . $controller;

            if (class_exists($controller)) {
                $objectController = new $controller();

                if (method_exists($objectController, $action)) {
                    $this->checkPermissions($uri);

                    if (empty($this->listOfRoutes[$uri]["template"])) {
                        $this->listOfRoutes[$uri]["template"] = "";
                    }

                    $objectController->$action($this->listOfRoutes[$uri]);
                } else {
                    die("L'action '" . $action . "' n'existe pas dans '" . $controller . "'");
                }
            } else {
                die("La class '" . $controller . "' n'existe pas");
            }
        } else {
            die("Le fichier '" . $controller . "' n'existe pas");
        }
    }

    public function getLocation(String $controller, String $action): String
    {
        foreach ($this->listOfRoutes as $key=>$route) {
            if($route["controller"] == $controller && $route["action"] == $action){
                return $key;
            }
        }
        return "/404"; // TODO: A modifier
    }

    public static function Redirect(String $controller, String $action): void
    {
        $routing = new Routing();
        header("Location: " . $routing->getLocation($controller, $action));
    }

    private function checkPermissions(string $uri): void
    {
        if (!empty($this->listOfRoutes[$uri]["restricted"])) {
            if (empty($_SESSION)) {
                // Si aucune session n'existe, envoyer sur login
                Routing::Redirect("FrontOffice/Security", "login");
            } else {
                // TODO: Vérifier que l'utilisateur a bien le/les rôle(s) nécessaire(s) pour accéder à la page
                die("Vous n'avez pas les droits pour accéder à cette page");
            }
        }
    }
}