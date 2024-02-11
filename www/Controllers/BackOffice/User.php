<?php

namespace App\Controllers\BackOffice;

use App\Core\View;
use App\Models\User as UserModel;

class User
{
    public function listUsers($data): void
    {
        $userModel = new UserModel();
        $users = $userModel->getAll();
        $myView = new View("BackOffice/Users/usersList", $data["template"]);
        $myView->assign("users", $users);
    }

    public function showUser($data): void 
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $userId = end($uriSegments);
        $userModel = new UserModel();
        $user = $userModel->getOneBy(['id' => $userId]); 
        $myView = new View("BackOffice/Users/userDetail", $data["template"]);
        $myView->assign("user", $user);
    }

    public function createUser($data): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();
            
            $userModel->setLogin($_POST['login']);
            $userModel->setEmail($_POST['email']);
            $userModel->setPassword($_POST['password']);
            $userModel->setValidate($_POST['validate']);
            $userModel->setRole($_POST['role']);
            $userModel->setStatus($_POST['status']);
            $userModel->setValidationToken($_POST['validation_token'] ?? '');
            $userModel->setResetToken($_POST['reset_token'] ?? '');

            $userModel->save();

            header('Location: /dashboard/users?message=User Created Successfully');
            exit;
        } else {
            $myView = new View("BackOffice/Users/userCreate", $data["template"]);
        }
    }

    public function editUser($data): void
    {
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $userId = end($uriSegments);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = UserModel::populate($userId);

            $userModel->setLogin($_POST['login']);
            $userModel->setEmail($_POST['email']);
            if (!empty($_POST['password'])) { 
                $userModel->setPassword($_POST['password']);
            }
            $userModel->setValidate($_POST['validate']);
            $userModel->setRole($_POST['role']);
            $userModel->setStatus($_POST['status']);
            $userModel->setValidationToken($_POST['validation_token'] ?? '');
            $userModel->setResetToken($_POST['reset_token'] ?? '');

            $userModel->save();

            header('Location: /dashboard/users?message=User Updated Successfully');
            exit;
        } else {
            $userModel = UserModel::populate($userId);
            $myView = new View("BackOffice/Users/userEdit", $data["template"]);
            $myView->assign("user", $userModel->getOneBy(['id' => $userId]));
        }
    }

    public function deleteUser($data): void
    {
        $userModel = new UserModel();
        $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $userId = end($uriSegments);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($userId && $userModel->delete(['id' => $userId])) {
                header('Location: /dashboard/users?message=Utilisateur supprimé avec succès');
            } else {
                header('Location: /dashboard/users?error=Échec de la suppression de l’utilisateur');
            }
        } else {
            if ($userId) {
                $user = $userModel->getOneBy(['id' => $userId]);
                if ($user) {
                    $myView = new View("BackOffice/Users/userConfirmDelete", $data["template"]);
                    $myView->assign("user", $user);
                } else {
                    header('Location: /dashboard/users?error=Utilisateur non trouvé');
                }
            } else {
                header('Location: /dashboard/users?error=ID d’utilisateur requis');
            }
        }
    }
}