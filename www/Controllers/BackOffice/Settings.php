<?php

namespace App\Controllers\BackOffice;

use App\Core\Utils;
use App\Models\Settings as SettingsModel;
use App\Models\User;
use App\Core\View;
use Cassandra\Date;

class Settings
{
    public function getSettings($data): void
    {
        $setting = new SettingsModel();

        $variablesCss = $setting->getAllByLike(["key" => "css:"], "object");
        print_r($variablesCss);

        $myView = new View("BackOffice/Dashboard/settings", $data["template"]);
        $myView->assign("variablesCss", $variablesCss);
    }
}
