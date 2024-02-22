<?php

namespace App\Controllers\BackOffice;

use App\Core\Routing;
use App\Core\Utils;
use App\Core\Verificator;
use App\Core\View;
use App\Forms\PageCreate;
use App\Forms\PageRemove;

class Pages
{

    public function getPagesList(): void
    {
        $pages = \App\Models\Pages::populateAllBy([]);
        foreach ($pages as &$page) $this->setDataToPageModel($page);

        $view = new View("BackOffice/Dashboard/pages", "back");
        $view->assign("pages", $pages);
    }

    public function createNewPage($route): void
    {
        $formCreate = new PageCreate;
        $config = $formCreate->getConfig();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors))
            {
                //print_r($_SESSION);

                $page = new \App\Models\Pages();
                $page->setTitle(htmlspecialchars($_REQUEST["title"]));
                $page->setUrl(htmlspecialchars($_REQUEST["url"]));
                $page->setIdCreator(htmlspecialchars($_SESSION["id"]));
                $page->setMetaDescription(htmlspecialchars($_REQUEST["description"]));
                $page->setContent("");
                $page->save();

                Routing::Redirect("BackOffice/Pages", "getPagesList");
                exit;
            }
        } else {
            $view = new View("BackOffice/Pages/pageCreate", "back");
            $view->assign("configFormCreatePage", $config);
            $view->assign("errorsForm", $errors);
        }
    }
    public function deletePage($route): void
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $pageId = end($uriSegments);

        $page = \App\Models\Pages::populate($pageId);

        $formCreate = new PageRemove($pageId);
        $config = $formCreate->getConfig();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $page->delete(["id"=>$pageId]);
            Routing::Redirect("BackOffice/Pages", "getPagesList");
            exit;
        } else {
            $view = new View("BackOffice/Pages/pageRemove", "back");
            $view->assign("page", $page);
            $view->assign("configFormRemovePage", $config);
            $view->assign("errorsForm", $errors);
        }

    }

    private function setDataToPageModel(&$page):void
    {
        $page["formated_created"] = Utils::convertDate($page["created_at"]);
        $page["title_url"] = Utils::url_encode($page["title"]);
        $page["Creator"] = \App\Models\User::populate($page["id_creator"]);
        if(!empty($page["id_updator"])){
            $page["Updator"] = \App\Models\User::populate($page["id_updator"]);
        }
    }

}