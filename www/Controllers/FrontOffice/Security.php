<?php

namespace App\Controllers\FrontOffice;

use App\Core\Routing;
use App\Core\Verificator;
use App\Core\View;
use App\Forms\UserInsert;
use App\Forms\UserLogin;
use App\Models\User;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class Security
{
    public Routing $routing;
    public function __construct()
    {
        $this->routing = new Routing();
    }


    public function login($route): void
    {

        $formLogin = new UserLogin();
        $config = $formLogin->getConfig();

        $errors = [];

        // Vérifier si le formulaire a été soumis
        if( $_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"])
        {
            // Valider les données du formulaire
            $verification = new Verificator();
            if($verification->checkForm($config, $_REQUEST, $errors))
            {
                try {
                    $userModel = new User();
                    $user = $userModel->getOneBy(['email' => $_REQUEST['email']]);
                    if ($user) {
                        if (password_verify($_REQUEST['password'], $user['password'])) {
                            session_start();
                            $_SESSION['id'] = $user['id'];
                            header('Location: /');
                            exit;
                        } 
                    }
                } catch (PDOException $e) {
                    die("Erreur lors de la vérification de l'utilisateur : " . $e->getMessage());
                }
            }
        }

        $myView = new View("FrontOffice/Security/login", $route["template"]);
        $myView->assign("configFormLogin", $config);
        $myView->assign("errorsForm", $errors);
    }
    public function register($route): void
    {
        $form = new UserInsert();
        $config = $form->getConfig();

        $errors = [];

        // Vérifier si le formulaire a été soumis
        if( $_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"])
        {
            // Valider les données du formulaire
            $verification = new Verificator();
            if($verification->checkForm($config, $_REQUEST, $errors))
            {
                $newUser = new User();
                $newUser->setLogin($_REQUEST["login"]);
                $newUser->setEmail($_REQUEST["email"]);
                $newUser->setPassword($_REQUEST["password"]);

                $validationToken = md5(uniqid());

                $newUser->setValidationToken($validationToken);
                $newUser->save();

                $mail = new PHPMailer(true); 

                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com'; 
                    $mail->SMTPAuth   = true;
                    $mail->Username   = "wisp.blog.project@gmail.com";
                    $mail->Password   = "eiwlqzoqvlhmcodf ";
                    $mail->Port       = 587; 
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPOptions = [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true,
                        ],
                    ];

                    // Recipients
                    $mail->setFrom('admin@wisp.fr', 'Wisp Admin');
                    $mail->addAddress($_REQUEST['email'], $_REQUEST['login']); // Add a recipient

                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'Confirmation d\'inscription';
                    $mail->Body    = 'Bonjour, ' . $_REQUEST['login'] . ',<br><br>Merci de vous être inscrit sur notre site. <br><br> Pour valider votre compte, cliquez sur le lien suivant : <br>' . 
                    'http://localhost/validate.php?token=' . $validationToken;

                    $mail->send();
                    echo 'E-mail de validation envoyé avec succès !';
                } catch (Exception $e) {
                    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
                }
            }
        }

        $myView = new View("FrontOffice/Security/register", $route["template"]);
        $myView->assign("configFormRegister", $config);
        $myView->assign("errorsForm", $errors);
    }
    public function logout($route): void
    {
        session_start();
        // Fermer la session
        session_destroy();
        // Rediriger vers login
        Routing::Redirect("FrontOffice/Security", "login");
    }
}