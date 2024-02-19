<?php

namespace App\Controllers\BackOffice;

use App\Controllers\Error;
use App\Core\View;
use App\Models\Article;
use App\Models\Pages;
use App\Models\Settings;

class Editor
{

    public function pageBuilder($route): void
    {
        $page = new Pages();
        if($page = $page->getOneBy(["id" => $_REQUEST["route_params"]["idPage"]]))
        {
            $host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"];
            $editor = new View("BackOffice/Editor/page-builderV2", "back");
            $editor->assign("currentPage", $page);
            $editor->assign("host", $host);
            $editor->assign("inPreview", false);
    
            $editor->assign("site_navbar", Settings::getBy(["key"=>"site:navbar"])->getValue());
            $editor->assign("site_footer", Settings::getBy(["key"=>"site:footer"])->getValue());
        }
        else Error::page404();
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

        $navbar = Settings::getBy(["key"=>"site:navbar"]);
        $navbar->setValue($_POST["page_header"]);
        $navbar->save();

        $navbar = Settings::getBy(["key"=>"site:footer"]);
        $navbar->setValue($_POST["page_footer"]);
        $navbar->save();

        if($page->save()) echo str_replace(" ", "-", strtolower($title));
    }

    public function displayPage(int $idPage): void {
        $page = Pages::populate($idPage);
        $editor = new View("BackOffice/Editor/page", "front");
        $editor->assign("currentPage", $page);
        $editor->assign("site_navbar", Settings::getBy(["key"=>"site:navbar"])->getValue());
        $editor->assign("site_footer", Settings::getBy(["key"=>"site:footer"])->getValue());
    }

    public function lastArticles($route): void
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $myArticles = (new Article())->getAllBy(["id_creator" => 2], "object");

            echo "<pre>";
            print_r($myArticles);
            echo "</pre>";
        }
        else Error::page404();
    }
}