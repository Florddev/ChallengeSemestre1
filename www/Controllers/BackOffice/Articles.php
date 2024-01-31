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

    public function articlesBuilder($article): void
    {
        $categories = (new Category())->getAllBy([], "object");

        $article["Creator"] = User::populate($article["id_creator"]);
        $article["Category"] = Category::populate($article["id_category"]);
        $article["convertedDate"] = Utils::convertDate($article["published_at"]);

        $editor = new View("BackOffice/Editor/article-builder", "back");
        $editor->assign("currentArticle", $article);
        $editor->assign("Categories", $categories);
    }

    public function articlesPage($article): void
    {
        $article["Creator"] = User::populate($article["id_creator"]);
        $article["Category"] = Category::populate($article["id_category"]);
        $article["convertedDate"] = Utils::convertDate($article["published_at"]);

        $editor = new View("BackOffice/Editor/article-page", "front");
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