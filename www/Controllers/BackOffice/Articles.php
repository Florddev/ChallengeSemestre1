<?php

namespace App\Controllers\BackOffice;

use App\Core\View;

class Articles
{
    public function getAllArticles($data): void
    {
        $myView = new View("BackOffice/Dashboard/articles", $data["template"]);
    }
}