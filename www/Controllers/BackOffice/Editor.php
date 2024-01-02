<?php

namespace App\Controllers\BackOffice;

use App\Core\View;

class Editor
{

    public function pageBuilder($route): void
    {
        new View("BackOffice/Editor/page-builderV2", $route["template"]);
    }
}