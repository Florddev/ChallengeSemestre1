<?php

namespace App\Controllers\FrontOffice;
use App\Core\View;

class Main
{
    public function home($route): void
    {
        new View("FrontOffice/Main/home", $route["template"]);
    }
}