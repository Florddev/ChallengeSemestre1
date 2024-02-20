<?php

namespace App\Controllers\BackOffice;

use App\Core\Routing;
use App\Core\View;
use App\Core\Verificator;
use App\Forms\CategoryCreate;
use App\Forms\CategoryDeleteConfirm;
use App\Forms\CategoryEdit;
use App\Models\Category as CategoryModel;

class Category 
{
    public function listCategories($data): void
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        $myView = new View("BackOffice/Categories/categoriesList", $data["template"]);
        $myView->assign("categories", $categories);
    }

    public function showCategory($data): void 
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $categoryId = end($uriSegments);

        $categoryModel = new CategoryModel();
        $category = $categoryModel->getOneBy(['id' => $categoryId]); 

        $myView = new View("BackOffice/Categories/categoryDetail", $data["template"]);
        $myView->assign("category", $category);
    }

    public function createCategory($data): void
    {
        $formCreate = new CategoryCreate();
        $config = $formCreate->getConfig();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors))
            {
                $categoryModel = new CategoryModel();
                
                $categoryModel->setLabel($_REQUEST['label']);

                $categoryModel->save();

                Routing::redirect("BackOffice/Category", "listCategories");

                exit;
            }
        } else {
            $myView = new View("BackOffice/Categories/categoryCreate", $data["template"]);
            $myView->assign("configFormCategoryCreate", $config);
            $myView->assign("errorsForm", $errors);
        }
    }

    public function editCategory($data): void
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $categoryId = end($uriSegments);

        $categoryModel = new CategoryModel();
        $category = $categoryModel->getOneBy(['id' => $categoryId]);

        $formEdit = new CategoryEdit($category);
        $config = $formEdit->getConfig();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors))
            {
                $categoryModel = CategoryModel::populate($categoryId);

                $categoryModel->setLabel($_REQUEST['label']);

                $categoryModel->save();

                Routing::redirect("BackOffice/Category", "listCategories");
                exit;
            }
        } else {
            $categoryModel = CategoryModel::populate($categoryId);
            $myView = new View("BackOffice/Categories/categoryEdit", $data["template"]);
            $myView->assign("configFormCategoryEdit", $config);
            $myView->assign("errorsForm", $errors);
            $myView->assign("category", $categoryModel->getOneBy(['id' => $categoryId]));
        }
    }

    public function deleteCategory($data): void
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $categoryId = end($uriSegments);

        $categoryModel = new CategoryModel();
        $formDelete = new CategoryDeleteConfirm($categoryId);
        $config = $formDelete->getConfig();

        $errors = [];        

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors))
            {
                $categoryId = $_REQUEST['id'];

                if ($categoryId && $categoryModel->delete(['id' => $categoryId])) {
                    Routing::redirect("BackOffice/Category", "listCategories");
                } else {
                    echo "Échec de la suppression de la categorie";
                }
            }
        } else {
            if ($categoryId) {
                $category = $categoryModel->getOneBy(['id' => $categoryId]);
                if ($category) {
                    $myView = new View("BackOffice/Categories/categoryConfirmDelete", $data["template"]);
                    $myView->assign("configFormCategoryDelete", $config);
                    $myView->assign("errorsForm", $errors);
                    $myView->assign("category", $category);
                } else {
                    echo "Categorie non trouvée";
                }
            } else {
                echo "ID de Categorie requis";
            }
        }
    }
}