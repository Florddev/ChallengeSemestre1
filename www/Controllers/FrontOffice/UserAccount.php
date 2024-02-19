<?php 

namespace App\Controllers\FrontOffice;

use App\Core\Routing;
use App\Core\Verificator;
use App\Core\View;
use App\Forms\UserChangePassword;
use App\Forms\UserDeactivateAccount;
use App\Forms\UserDeleteAccount;
use App\Models\User;

class userAccount
{
    public Routing $routing;
    public function __construct()
    {
        $this->routing = new Routing();
    }
    
    public function userAccount($route): void
    {
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            exit;
        }

        $view = new View("FrontOffice/UserAccount/userAccount", $route["template"]);
        $userModel = new User();
        $user = $userModel->getOneBy(['id' => $_SESSION['id']]);
        $view->assign("user", $user);
    }

    public function changePassword($route): void
    {
        $form = new UserChangePassword();
        $config = $form->getConfig();
        
        $errors = [];
        
        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors)) {
                $currentPassword = $_REQUEST['currentPassword'];
                $newPassword = $_REQUEST['newPassword'];
                
                $userModel = new User();
                $user = $userModel->getOneBy(['id' => $_SESSION['id']]);
                
                if ($user && password_verify($currentPassword, $user['password'])) {
                    $userModel->setId($user['id']);
                    $userModel->setPassword($newPassword);
                    $userModel->save();
                    
                    echo "Mot de passe modifié avec succès.";
                } else {
                    echo "Le mot de passe actuel est incorrect.";
                }
            }
        }
        
        $view = new View("FrontOffice/UserAccount/changePassword", $route["template"]);
        $view->assign("configFormUserChangePassword", $config);
        $view->assign("errorsForm", $errors);
    }

    public function deactivateAccount($route): void
    {
        $form = new UserDeactivateAccount();
        $config = $form->getConfig();
        
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors)) {
                if (isset($_SESSION['id'])) {
                    $userModel = new User();
                    $user = $userModel->getOneBy(['id' => $_SESSION['id']]);

                    if (password_verify($_REQUEST['password'], $user['password'])) {
                        $userModel->setId($_SESSION['id']);
                        $userModel->setStatus(1);
                        $userModel->save();
                        
                        session_destroy();
                        header('Location: /login');
                        exit;
                    } else {
                        $errors['password'] = "Mot de passe incorrect.";
                    }
                } else {
                    header('Location: /login');
                    exit;
                }
            }
        }

        $view = new View("FrontOffice/UserAccount/deactivateAccount", $route["template"]);
        $view->assign("configFormDeactivateAccount", $config);
        $view->assign("errorsForm", $errors);
    }

    public function deleteAccount($route): void
    {
        $form = new UserDeleteAccount();
        $config = $form->getConfig();
        
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {
            $verification = new Verificator();
            if ($verification->checkForm($config, $_REQUEST, $errors)) {
                if (isset($_SESSION['id'])) {
                    $userModel = new User();
                    $user = $userModel->getOneBy(['id' => $_SESSION['id']]);

                    if (password_verify($_REQUEST['password'], $user['password'])) {
                        if ($userModel->delete(['id' => $_SESSION['id']])) {
                            session_destroy();
                            header('Location: /login');
                            exit();
                        } else {
                            echo "Une erreur est survenue lors de la suppression du compte.";
                        }
                    } else {
                        $errors['password'] = "Mot de passe incorrect.";
                    }
                } else {
                    header('Location: /login');
                    exit;
                }
            }
        }

        $view = new View("FrontOffice/UserAccount/deleteAccount", $route["template"]);
        $view->assign("configFormDeleteAccount", $config);
        $view->assign("errorsForm", $errors);
    }
}