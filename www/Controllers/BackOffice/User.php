<?php

namespace App\Controllers\BackOffice;

use App\Core\View;
use App\Core\Verificator;
use App\Enums\Role;
use App\Enums\Status;
use App\Forms\UserCreate;
use App\Forms\UserDeleteConfirm;
use App\Forms\UserEdit;
use App\Models\User as UserModel;

class User
{
    public function listUsers($data): void
    {
        $userModel = new UserModel();
        $users = $userModel->getAll();

        $roleNames = [];
        foreach (Role::cases() as $roleCase) {
            $roleNames[$roleCase->value] = $roleCase->name;
        }

        $statusNames = [];
        foreach (Status::cases() as $statusCase) {
            $statusNames[$statusCase->value] = $statusCase->name;
        }

        $myView = new View("BackOffice/Users/usersList", $data["template"]);
        $myView->assign("users", $users);
        $myView->assign("roleNames", $roleNames);
        $myView->assign("statusNames", $statusNames);
    }

    public function showUser($data): void 
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $userId = end($uriSegments);

        $userModel = new UserModel();
        $user = $userModel->getOneBy(['id' => $userId]); 

        $roleNames = [];
        foreach (Role::cases() as $roleCase) {
            $roleNames[$roleCase->value] = $roleCase->name;
        }

        $statusNames = [];
        foreach (Status::cases() as $statusCase) {
            $statusNames[$statusCase->value] = $statusCase->name;
        }

        $myView = new View("BackOffice/Users/userDetail", $data["template"]);
        $myView->assign("user", $user);
        $myView->assign("roleNames", $roleNames);
        $myView->assign("statusNames", $statusNames);
    }

    public function createUser($data): void
    {
        $formCreate = new UserCreate();
        $config = $formCreate->getConfig();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors))
            {
                $userModel = new UserModel();
                
                $userModel->setLogin(htmlspecialchars($_REQUEST['login']));
                $userModel->setEmail(htmlspecialchars($_REQUEST['email']));
                $userModel->setPassword(htmlspecialchars($_REQUEST['password']));
                $userModel->setRole(htmlspecialchars($_REQUEST['role']));
                $userModel->setStatus(htmlspecialchars($_REQUEST['status']));

                $userModel->save();

                header('Location: /dashboard/users');
                exit;
            }
        } else {
            $myView = new View("BackOffice/Users/userCreate", $data["template"]);
            $myView->assign("configFormUserCreate", $config);
            $myView->assign("errorsForm", $errors);
        }
    }

    public function editUser($data): void
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $userId = end($uriSegments);

        $userModel = new UserModel();
        $user = $userModel->getOneBy(['id' => $userId]);

        $formEdit = new UserEdit($user);
        $config = $formEdit->getConfig();

        $errors = [];

        $roleNames = [];
        foreach (Role::cases() as $roleCase) {
            $roleNames[$roleCase->value] = $roleCase->name;
        }

        $statusName = [];
        foreach (Status::cases() as $statusCase) {
            $statusNames[$statusCase->value] = $statusCase->name;
        }

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors))
            {
                $userModel = UserModel::populate($userId);

                $userModel->setLogin(htmlspecialchars($_REQUEST['login']));
                $userModel->setEmail(htmlspecialchars($_REQUEST['email']));
                if (!empty($_REQUEST['password'])) { 
                    $userModel->setPassword(htmlspecialchars($_REQUEST['password']));
                }
                $userModel->setRole(htmlspecialchars($_REQUEST['role']));
                $userModel->setStatus(htmlspecialchars($_REQUEST['status']));

                $userModel->save();

                header('Location: /dashboard/users');
                exit;
            }
        } else {
            $userModel = UserModel::populate($userId);
            $myView = new View("BackOffice/Users/userEdit", $data["template"]);
            $myView->assign("configFormUserEdit", $config);
            $myView->assign("errorsForm", $errors);
            $myView->assign("user", $userModel->getOneBy(['id' => $userId]));
            $myView->assign("roleNames", $roleNames);
            $myView->assign("statusNames", $statusNames);
        }
    }

    public function deleteUser($data): void
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $userId = end($uriSegments);

        $userModel = new UserModel();
        $formDelete = new UserDeleteConfirm($userId);
        $config = $formDelete->getConfig();

        $errors = [];        

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors))
            {
                $userId = $_REQUEST['id'];

                if ($userId && $userModel->delete(['id' => $userId])) {
                    header('Location: /dashboard/users');
                } else {
                    echo "Échec de la suppression de l’utilisateur";
                }
            }
        } else {
            if ($userId) {
                $user = $userModel->getOneBy(['id' => $userId]);
                if ($user) {
                    $myView = new View("BackOffice/Users/userConfirmDelete", $data["template"]);
                    $myView->assign("configFormUserDelete", $config);
                    $myView->assign("errorsForm", $errors);
                    $myView->assign("user", $user);
                } else {
                    echo "Utilisateur non trouvé";
                }
            } else {
                echo "ID d’utilisateur requis";
            }
        }
    }
}