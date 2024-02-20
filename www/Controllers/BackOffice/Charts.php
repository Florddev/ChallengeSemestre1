<?php

namespace App\Controllers\BackOffice;

use App\Core\View;
use App\Core\Verificator;

use App\Models\User as UserModel;
use App\Models\Article as ArticleModel;
use App\Models\Category as CategoryModel;
use App\Models\Comment as CommentModel;
use App\Models\Pages as PagesModel;

class Charts
{
    public function listCharts($data): void
    {
        $userModel = new UserModel();
        $countUsersValidated = $userModel->CountAllValidatedUsers();

        $userModel = new UserModel();
        $countUsersUnvalidated = $userModel->CountAllUnvalidatedUsers();

        $articleModel = new ArticleModel();
        $countArticles = $articleModel->CountAll();

        $categoryModel = new CategoryModel();
        $countCategories = $categoryModel->CountAll();

        $commentModel = new CommentModel();
        $countComments = $commentModel->CountAll();

        $pagesModel = new PagesModel();
        $countPages = $pagesModel->CountAll();

        $userCountsByMonths = array_reverse($userModel->countByLast12Months());
        $articleCountsByMonths = array_reverse($articleModel->countByLast12Months());

        $lastmonths = array();
        for ($i = 11; $i >= 0; $i--) {
            $lastmonths[] = date('F', strtotime("-$i months"));
            
        }


        $myView = new View("BackOffice/Dashboard/accueil", $data["template"]);
        $myView->assign("countUsersValidated", $countUsersValidated);
        $myView->assign("countUsersUnvalidated", $countUsersUnvalidated);
        $myView->assign("userCountsByMonths", $userCountsByMonths);
        $myView->assign("articleCountsByMonths", $articleCountsByMonths);
        $myView->assign("lastmonths", $lastmonths);
        $myView->assign("countArticles", $countArticles);
        $myView->assign("countCategories", $countCategories);
        $myView->assign("countComments", $countComments);
        $myView->assign("countPages", $countPages);
    }
   
}