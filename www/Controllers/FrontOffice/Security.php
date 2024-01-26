<?php

namespace App\Controllers\FrontOffice;


use App\Core\Routing;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

use App\Core\View;

class Security
{
    public Routing $routing;
    public function __construct()
    {
        $this->routing = new Routing();
    }


    public function login($route): void
    {

        $myView = new View("FrontOffice/Security/login", $route["template"]);

        $mail = new PHPMailer(true); 

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; 
            $mail->SMTPAuth   = true;
            $mail->Username   = "email"; // Activier double authentification sur compte
            $mail->Password   = "password"; // MDP à créer sur compte google pour application
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
            $mail->setFrom('FromEmail', 'PageBuilder');
            $mail->addAddress('TOEmail', 'User'); // Add a recipient

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Subject';
            $mail->Body    = 'body';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function register($route): void
    {
        $myView = new View("FrontOffice/Security/register", $route["template"]);
    }
    public function logout($route): void
    {
        // Fermer la session
        session_destroy();
        // Rediriger vers login
        Routing::Redirect("FrontOffice/Security", "login");
    }
}