<?php

namespace App\Controllers\BackOffice;

use App\Core\View;
use App\Models\Article;

class Editor
{

    public function pageBuilder($route): void
    {
        new View("BackOffice/Editor/page-builderV2", $route["template"]);
    }

    public function lastArticles($route): void
    {
        $myArticles = (new Article())->getAllBy(["id_creator" => 2], "object");

        echo "<pre>";
        print_r($myArticles);
        echo "</pre>";
    }
}