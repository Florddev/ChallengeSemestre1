<?php

namespace App\Controllers\FrontOffice;
use App\Core\View;
use App\Models\Category;
use App\Models\User;

class Main
{
    public function home($route): void
    {
        $myCategory = Category::populate(1);

        echo "<pre>";
        print_r($myCategory);
        echo "</pre>";

        new View("FrontOffice/Main/home", $route["template"]);
    }
}