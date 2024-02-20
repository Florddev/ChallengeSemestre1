<?php

namespace App\Controllers\BackOffice;

use App\Controllers\Error;
use App\Core\Routing;
use App\Core\Utils;
use App\Core\View;
use App\Core\Verificator;
use App\Forms\ArticleCreate;
use App\Forms\ArticleDeleteConfirm;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Cassandra\Date;

class Articles
{
    public function getAllArticles($data): void
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        $categoriesNames = [];
        foreach ($categories as $category) {
            $categoriesNames[$category["id"]] = $category["label"];
        }

        $userModel = new User();
        $users = $userModel->getAll();
        $usersNames = [];
        foreach ($users as $user) {
            $usersNames[$user["id"]] = $user["login"]; // Assurez-vous que "name" est le bon champ
        }

        $articleModel = new Article();
        $articles = $articleModel->getAll();

        foreach ($articles as &$article) {
            $article['category_name'] = $categoriesNames[$article['id_category']] ?? 'Catégorie inconnue';
            $article['creator_name'] = $usersNames[$article['id_creator']] ?? 'Créateur inconnu';
            $this->setDataToArticle($article);
        }

        $myView = new View("BackOffice/Articles/articlesList", $data["template"]);
        $myView->assign("articles", $articles);
    }

    public function createArticle($data): void
    {
        $formCreate = new ArticleCreate();
        $config = $formCreate->getConfig();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors))
            {
                $articleModel = new Article();
                
                $articleModel->setTitle($_REQUEST['title']);
                $articleModel->setContent($_REQUEST['content']);
                $articleModel->setKeywords($_REQUEST['keywords']);
                $articleModel->setPictureUrl($_REQUEST['picture_url']);
                $articleModel->setIdCategory($_REQUEST['id_category']);
                $articleModel->setIdCreator($_SESSION['id']);

                $articleModel->save();

                Routing::redirect("BackOffice/Articles", "getAllArticles");

                exit;
            }
        } else {
            $myView = new View("BackOffice/Articles/articleCreate", $data["template"]);
            $myView->assign("configFormArticleCreate", $config);
            $myView->assign("errorsForm", $errors);
        }
    }
    
    public function deleteArticle($data): void
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $articleId = end($uriSegments);

        $articleModel = new Article();
        $formDelete = new ArticleDeleteConfirm($articleId);
        $config = $formDelete->getConfig();

        $errors = [];        

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors))
            {
                $articleId = $_REQUEST['id'];

                if ($articleId && $articleModel->delete(['id' => $articleId])) {
                    Routing::redirect("BackOffice/Articles", "getAllArticles");
                } else {
                    echo "Échec de la suppression de l'article";
                }
            }
        } else {
            if ($articleId) {
                $article = $articleModel->getOneBy(['id' => $articleId]);
                if ($article) {
                    $myView = new View("BackOffice/Articles/articleConfirmDelete", $data["template"]);
                    $myView->assign("configFormArticleDelete", $config);
                    $myView->assign("errorsForm", $errors);
                    $myView->assign("article", $article);
                } else {
                    echo "Article non trouvé";
                }
            } else {
                echo "ID de l'Article requis";
            }
        }
    }

    private function setDataToArticle(&$article): void
    {
        $article['created_at'] = Utils::convertDate($article['created_at']);
        $article['published_at_formated'] = Utils::convertDate($article['published_at']);
        $article["encode_title"] = Utils::url_encode($article["title"]);
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

    public function handleShowArticleFromURI(): void
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $encodeTitle = end($uriSegments);

        $articles = Article::populateAllBy([]);
        $articleFound = null;

        foreach ($articles as $article) {
            $title = Utils::url_encode($article["title"]);
            if ($title === $encodeTitle) {
                $articleFound = $article;
                break;
            }
        }

        if ($articleFound !== null) {
            if (!empty($articleFound["published_at"])) {
                $articleDate = Utils::convertDate($articleFound["published_at"], "Y-m-d");
                $currentDate = Utils::convertDate(\date("Y-m-d H:i:s"), "Y-m-d");
    
                if($articleDate <= $currentDate){
                    $builder = new Articles();
                    $builder->articlesPage($articleFound);
                    return;
                }
            }
        }

        Error::page404();
    }
}