<?php

namespace App\Controllers\BackOffice;

use App\Core\View;

class Main
{
    public function home($data): void
    {
        $myView = new View("BackOffice/Dashboard/accueil", $data["template"]);
    }
}