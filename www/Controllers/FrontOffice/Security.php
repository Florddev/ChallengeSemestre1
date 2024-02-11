<?php

namespace App\Controllers\FrontOffice;

use App\Core\Routing;
use App\Core\Verificator;
use App\Core\View;
use App\Forms\ResetPassword;
use App\Forms\ResetPasswordRequest;
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
                            $_SESSION['role'] = $user['role'];
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

                $protocole = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";

                $host = $_SERVER['HTTP_HOST'];

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
                    $url = $protocole . "://" . $host . "/validate-account?token=$validationToken";
                    $mail->Body    = "Bonjour, " . $_REQUEST['login'] . ",<br><br>Merci de votre inscription sur notre site. <br><br> Pour valider votre compte, cliquez sur le lien suivant : <br><br>
                    <a href='$url'>$url</a>";

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

    public function validateAccount($route): void
{
    $token = $_GET['token'] ?? '';

    if (empty($token)) {
        echo 'Le lien de validation est manquant. Assurez-vous d\'utiliser le bon lien.';
        return;
    }

    $userModel = new User();
    $user = $userModel->getOneBy(['validation_token' => $token]);

    if ($user) {
        $userModel->setId($user['id']);
        $userModel->setValidationToken('');
        $userModel->setValidate('true');
        $userModel->save();

        echo 'Félicitations, votre compte est maintenant validé ! Vous pouvez maintenant vous connecter.';
    } else {
        echo 'Le lien de validation est invalide. Assurez-vous d\'utiliser le bon lien.';
    }
}

    public function resetPasswordRequest($route): void
    {
        $form = new ResetPasswordRequest();
        $config = $form->getConfig();

        $errors = [];

        if( $_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"])
        {
            $verification = new Verificator();
            if($verification->checkForm($config, $_REQUEST, $errors))
            {
                $email = $_POST['email'] ?? '';

                $userModel = new User();
                $user = $userModel->getOneBy(['email' => $email]);

                if ($user) {
                    $token = bin2hex(random_bytes(50)); 
                    $userModel->setId($user['id']);
                    $userModel->setResetToken($token);
                    $userModel->save();

                    $mail = new PHPMailer(true);

                    $protocole = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";

                    $host = $_SERVER['HTTP_HOST'];

                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'wisp.blog.project@gmail.com';
                        $mail->Password = 'eiwlqzoqvlhmcodf ';
                        $mail->Port = 587;
                        $mail->SMTPSecure = 'tls';
                        $mail->SMTPOptions = [
                            'ssl' => [
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true,
                            ],
                        ];

                        $mail->setFrom('no-reply@wisp.fr', 'Wisp');
                        $mail->addAddress($email);

                        $mail->isHTML(true);
                        $mail->Subject = 'Réinitialisation de votre mot de passe';
                        $url = $protocole . "://" . $host . "/reset-password?token=$token";
                        $mail->Body = "Cliquez sur ce lien pour réinitialiser votre mot de passe: <br><br><a href='$url'>$url</a>";

                        $mail->send();
                        echo "Un email de réinitialisation a été envoyé à votre adresse.";
                    } catch (Exception $e) {
                        echo "L'email n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    echo "Aucun utilisateur trouvé avec cet e-mail.";
                }
            }
        }

        $view = new View("FrontOffice/Security/resetPasswordRequest", $route["template"]);
        $view->assign("configFormResetPasswordRequest", $config);
        $view->assign("errorsForm", $errors);
    }

    public function resetPassword($route): void
    {
        $token = $_REQUEST['token'] ?? null;
        $form = new ResetPassword($token);
        $config = $form->getConfig();

        $errors = [];

        if( $_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) 
        {
            $verification = new Verificator();
            if($verification->checkForm($config, $_REQUEST, $errors))
            {
                $userModel = new User();
                $user = $userModel->getOneBy(['reset_token' => $token]);

                if ($user) {
                    $userModel->setId($user['id']);
                    $userModel->setPassword($_REQUEST['password']);
                    $userModel->setResetToken('');
                    $userModel->save();
                    echo "Votre mot de passe a été réinitialisé avec succès.";
                    header("Location: /login");
                    exit;
                }
            }
        }

        $view = new View("FrontOffice/Security/resetPassword", $route["template"]);
        $view->assign("configFormResetPassword", $config);
        $view->assign("errorsForm", $errors);
        $view->assign("token", $token);
    }
}