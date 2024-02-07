<?php

namespace App\Controllers;
class Error
{

//    public function page404():void
    public static function page404():void
    {
        // Modifier le code http
        session_start();
        echo "Ma Page 404";
        if (isset($_SESSION['id'])) {
            echo "Bonjour " . $_SESSION['id'];
        } else {
            echo "Bonjour invité";
        }
    }
}
