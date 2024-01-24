<?php

namespace App\Controllers\FrontOffice;

use App\Core\Routing;
use App\Core\View;

class Security
{
    public Routing $routing;
    public function __construct()
    {
        $this->routing = new Routing();
    }


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
        // Rediriger vers login
        Routing::Redirect("FrontOffice/Security", "login");
    }
}