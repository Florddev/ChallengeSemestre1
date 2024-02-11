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
        

        $myView = new View("BackOffice/Dashboard/settings", $data["template"]);
        $myView->assign("variablesCss", $variablesCss);


        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $i=0;

            foreach ($_POST['values'] as $key => $value) {
                $variablesCss[$i]->setValue($value);
                $variablesCss[$i]->save();
                $i = $i + 1;
            }
            
        }
    }
}
