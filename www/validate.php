<?php
require_once 'vendor/autoload.php';
require_once 'Models/User.php';
require_once 'Core/DB.php';

use App\Core\DB;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $userModel = new User();
    $user = $userModel->getOneBy(['validation_token' => $token]);

    if ($user) {
        $userModel->setId($user['id']);
        $userModel->setValidate('true');
        $userModel->save();

        echo 'Félicitations, votre compte est maintenant validé ! Vous pouvez maintenant vous connecter.';
    } else {
        echo 'Le lien de validation est invalide. Assurez-vous d\'utiliser le bon lien.';
    }
} else {
    echo 'Le lien de validation est manquant. Assurez-vous d\'utiliser le bon lien.';
}