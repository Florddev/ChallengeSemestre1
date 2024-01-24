<?php

namespace App\Controllers\BackOffice;

use App\Core\View;
use App\Models\Article;
use App\Models\Pages;

class Editor
{

    public function pageBuilder($page): void
    {
        $host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
        $editor = new View("BackOffice/Editor/page-builderV2", "back");
        $editor->assign("currentPage", $page);
        $editor->assign("host", $host);
    }

    public function savePage($route): void {
        $id = $_POST["id"];
        $url = $_POST["url"];
        $title = $_POST["title"];
        $content = $_POST["content"];

        $page = Pages::populate($id);
        $page->setUrl('/'.$url);
        $page->setTitle($title);
        $page->setContent($content);

        if($page->save()) echo str_replace(" ", "-", strtolower($title));
    }

    public function displayPage(int $idPage): void {
        $page = Pages::populate($idPage);
        $editor = new View("BackOffice/Editor/page", "front");
        $editor->assign("currentPage", $page);
    }

    public function lastArticles($route): void
    {
        $myArticles = (new Article())->getAllBy(["id_creator" => 2], "object");

        echo "<pre>";
        print_r($myArticles);
        echo "</pre>";
    }
}