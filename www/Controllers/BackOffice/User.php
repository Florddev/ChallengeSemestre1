<?php

namespace App\Controllers\BackOffice;

use App\Core\View;

class User
{
    public function listUsers($data): void
    {
        $myView = new View("BackOffice/Dashboard/usersList", $data["template"]);
    }
}