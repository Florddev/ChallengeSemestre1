<?php

namespace App\Controllers\BackOffice;

use App\Core\View;

class Users
{
    public function listUsers($data): void
    {
        $myView = new View("BackOffice/Users/usersList", $data["template"]);
    }
}