<?php

namespace App\Controllers\BackOffice;

use App\Core\Utils;
use App\Models\Article;
use App\Models\Category;
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
        $article["Creator"] = User::populate($article["id_creator"]);
        $article["Category"] = Category::populate($article["id_category"]);
        $article["datePublication"] = Utils::convertDate($article["published_at"]);

        // TODO: Créer le model pour les commentaires, et récupérer les commentaires à partir de l'id de l'article
        // Une fois le model "Comment" créé récupérer tout les commentaires liés à l'article avec:
        // $article["Comments"] = Comment::populateAllBy(["id_article"=>$article["id"]]);
    }

    public function articlesBuilder($article): void
    {
        $editor = new View("BackOffice/Editor/article-builder", "back");

        $this->setDataToArticle($article);
        $editor->assign("currentArticle", $article);

        $categories = (new Category())->getAllBy([], "object");
        $editor->assign("Categories", $categories);
    }

    public function articlesPage($article): void
    {
        $editor = new View("BackOffice/Editor/article-page", "front");

        $this->setDataToArticle($article);
        $editor->assign("currentArticle", $article);
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