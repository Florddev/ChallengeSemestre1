<?php

namespace App;
use App\Controllers\BackOffice\Editor;
use App\Controllers\Error;
use App\Core\Routing;
use App\Models\Pages;

spl_autoload_register("App\myAutoloader");

function myAutoloader(String $class): void
{
    //$class = App\Core\View
    $class = str_replace("App\\","", $class);
    //$class = Core\View
    $class = str_replace("\\","/", $class);
    //$class = Core/View
    if(file_exists($class.".php")){
        include $class.".php";
    }
}

$routing = new Routing();
$routing->handleRequest();