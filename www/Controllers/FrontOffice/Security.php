<?php

namespace App\Controllers\FrontOffice;

use App\Core\View;

class Security
{

    public function login($route): void
    {
        $myView = new View("FrontOffice/Security/login", $route["template"]);
    }
    public function register($route): void
    {
        $myView = new View("FrontOffice/Security/register", $route["template"]);
    }
    public function logout($route): void
    {
        // Fermer la session
        session_destroy();
        // Rediriger vers l'accueil
        header("Location: /");
    }
}