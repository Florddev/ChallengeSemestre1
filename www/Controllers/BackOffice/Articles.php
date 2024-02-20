<?php

namespace App\Controllers\BackOffice;

use App\Controllers\Error;
use App\Core\Utils;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Core\View;
use Cassandra\Date;

class Articles
{
    public function getAllArticles($data): void
    {

        $myView = new View("BackOffice/Dashboard/articles", $data["template"]);
    }

    private function setDataToArticle(&$article): void
    {
        $article["Category"] = Category::populate($article["id_category"]);
        $article["datePublication"] = Utils::convertDate($article["published_at"]);
        $article["Comments"] = Comment::populateAllBy(["id_article"=>$article["id"], "id_comment_response" => null]);
        $article["Creator"] = User::populate($article["id_creator"]);
        foreach ($article["Comments"] as $key => $comment) {
            $article["Comments"][$key]["User"] = User::populate($comment["id_user"]);
            $article["Comments"][$key]["datePublication"] = Utils::convertDate($comment["created_at"]);
            $article["Comments"][$key]["Responses"] = Comment::populateAllBy(["id_comment_response" => $comment["id"]]);
            foreach ($article["Comments"][$key]["Responses"] as $key2 => $response) {
                $article["Comments"][$key]["Responses"][$key2]["User"] = User::populate($response["id_user"]);
                $article["Comments"][$key]["Responses"][$key2]["datePublication"] = Utils::convertDate($response["created_at"]);
            }
        }
    }

    public function articlesBuilder($article): void
    {
        $article = new Article();
        if($article = $article->getOneBy(["id" => $_REQUEST["route_params"]["idArticle"]])) {
            $this->setDataToArticle($article);
            $editor = new View("BackOffice/Editor/article-builder", "back");

            $editor->assign("currentArticle", $article);

            $categories = (new Category())->getAllBy([], "object");
            $editor->assign("Categories", $categories);
        }
        else Error::page404();
    }

    public function articlesPage($article): void
    {
        $article = new Article();
        if($article = $article->getOneBy(["id" => $_REQUEST["route_params"]["idArticle"]])) {
            $editor = new View("BackOffice/Editor/article-page", "front");
            $this->setDataToArticle($article);
            $editor->assign("currentArticle", $article);
        }
        else Error::page404();
    }

    public function saveArticle($data): void
    {
        $id = $_POST["id"];

        $article = Article::populate($id);
        $article->setTitle(trim($_POST["title"]));
        $article->setPictureUrl($_POST["pictureUrl"]);
        $article->setContent($_POST["content"]);
        $article->setIdCategory($_POST["category"]);

        if($_POST["date_publication"] !== "") $article->setPublishedAt($_POST["date_publication"]);
        // TODO: SetUpdator

        $article->save();
    }
}