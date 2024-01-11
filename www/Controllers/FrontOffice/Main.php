<?php

namespace App\Controllers\FrontOffice;
use App\Core\View;
use App\Models\Article;
use App\Models\Category;
use App\Models\Pages;
use App\Models\User;

class Main
{
    public function home($route): void
    {
        /*
        $page = new Pages();
        $page->setUrl("/contact");
        $page->setTitle("Contact");
        $page->setContent("<h1 class='editable editable-text'>Ma page de contact</h1>");
        $page->setMetaDescription("La meta description");
        $page->setIdCreator(2);
        $page->save();
        */

        $myCategory = Category::populate(1);

        echo "<pre>";
        print_r($myCategory);
        print_r($myCategory);
        print_r($myCategory);
        echo "</pre>";

        new View("FrontOffice/Main/home", $route["template"]);
    }

    public function designGuide($route): void
    {
        new View("FrontOffice/Main/design-guide", $route["template"]);
    }
}