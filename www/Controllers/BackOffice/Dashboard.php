<?php

namespace App\Controllers\BackOffice;

use App\Core\View;

class Dashboard
{

    public function pageDashboard($route): void
    {
        new View("BackOffice/Dashboard/page-dashboard", $route["template"]);
    }
}