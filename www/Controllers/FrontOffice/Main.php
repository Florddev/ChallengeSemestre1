<?php

namespace App\Controllers\FrontOffice;
use App\Core\View;
use App\Models\Category;
use App\Models\Pages;
use App\Models\User;

class Main
{
    public function home($route): void
    {
        /*
        $page = new Pages();
        $page->setUrl("/myCustomPage");
        $page->setTitle("Ma page custom");
        $page->setContent("<h1>Ma page généré</h1><p>lorem ipsum blabla...</p>");
        $page->setMetaDescription("La meta description");
        $page->setIdCreator(2);
        $page->save();
        */

        new View("FrontOffice/Main/home", $route["template"]);
    }

    public function designGuide($route): void
    {
        new View("FrontOffice/Main/design-guide", $route["template"]);
    }
}