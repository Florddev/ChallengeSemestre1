<?php

namespace App\Controllers;
use App\Core\View;

class Error
{

//    public function page404():void
    public static function page404():void
    {
        // Modifier le code http
        $Page404 = new View("BackOffice/Pages/page404");

    }
}
