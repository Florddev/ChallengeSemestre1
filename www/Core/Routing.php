<?php

namespace App\Core;

use App\Controllers\BackOffice\Articles;
use App\Controllers\BackOffice\Editor;
use App\Controllers\Error;
use App\Enums\Role;
use App\Models\Article;
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

    // public function handleRequest(): void
    // {
    //     // Comment récupérer et nettoyer l'URI
    //     $uri = strtolower($_SERVER["REQUEST_URI"]);
    //     $uri = strtok($uri, "?");
    //     $uri = strlen($uri) > 1 ? rtrim($uri, "/") : $uri;

    //     if (!empty($this->listOfRoutes[$uri])) {
    //         $this->dispatch($uri);
    //     } else {
    //         $this->handleCustomRedirections($uri);
    //     }
    // }

    public function handleRequest(): void {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $uri = strtolower($_SERVER["REQUEST_URI"]);
        $uri = strtok($uri, "?");
        $uri = strlen($uri) > 1 ? rtrim($uri, "/") : $uri;
    
        $foundRoute = false;
    
        foreach ($this->listOfRoutes as $route => $config) {
            $pattern = preg_replace('/\/:([^\/]+)/', '/([^/]+)', $route);
            if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                array_shift($matches);
                $foundRoute = true;
                if (!empty($config['params']) && !empty($matches)) {
                    foreach ($config['params'] as $index => $name) {
                        $_REQUEST["route_params"][$name] = $matches[$index] ?? null;
                    }
                }
                $this->dispatch($route);
                break;
            }
        }
    
        if (!$foundRoute) {
            if ($page = Pages::getBy(["url" => $uri])) {
                $builder = new Editor();
                $builder->displayPage($page->getId());
            }
            else Error::page404();
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
                Routing::Redirect("FrontOffice/Security", "login");
            } else {
                $userRole = Role::tryFrom((int)$_SESSION['role']);

                if ($userRole !== null && !empty($this->listOfRoutes[$uri]['roles']) && !in_array($userRole->value, $this->listOfRoutes[$uri]['roles'])) {
                    die("Vous n'avez pas les droits pour accéder à cette page");
                }
            }
        }
    }
}
