<?php

namespace App\Controllers\BackOffice;

use App\Core\Utils;
use App\Forms\SettingsCSS;
use App\Models\Settings as SettingsModel;
use App\Models\User;
use App\Core\View;
use Cassandra\Date;

class Settings
{
        public function getSettings($data): void
        {
                //         $setting = new SettingsModel();

                //         $variablesCss = $setting->getAllByLike(["key" => "css:"], "object");


                //         $myView = new View("BackOffice/Dashboard/settings", $data["template"]);
//         $myView->assign("variablesCss", $variablesCss);


                //         if ($_SERVER["REQUEST_METHOD"] === "POST") {
//             $i=0;

                //             foreach ($_POST['values'] as $key F => $value) {
//                 $variablesCss[$i]->setValue($value);
//                 $variablesCss[$i]->save();
//                 $i = $i + 1;
//             }

                //         }

                $config = (new SettingsCSS())->getConfig();
                $configCSS = new View("BackOffice/Dashboard/settings", $data["template"]);
                $configCSS->assign("configSettingsForm", $config);

                if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {

                        $SettingModel = new SettingsModel();

                        $primary = $SettingModel->getOneBy(["key" => "css:primary"], "object");
                        $primary->setValue($_REQUEST["css:primary"]);
                        $primary->save();

                        $secondary = $SettingModel->getOneBy(["key" => "css:secondary"], "object");
                        $secondary->setValue($_REQUEST["css:secondary"]);
                        $secondary->save();

                        $primary = $SettingModel->getOneBy(["key" => "css:tercery"], "object");
                        $primary->setValue($_REQUEST["css:tercery"]);
                        $primary->save();

                        $primary = $SettingModel->getOneBy(["key" => "css:main-font1"], "object");
                        $primary->setValue($_REQUEST["css:main-font1"]);
                        $primary->save();

                        $primary = $SettingModel->getOneBy(["key" => "css:main-radius"], "object");
                        $primary->setValue($_REQUEST["css:main-radius"]."px");
                        $primary->save();

                        $primary = $SettingModel->getOneBy(["key" => "css:transition-duration"], "object");
                        $primary->setValue($_REQUEST["css:transition-duration"]."s");
                        $primary->save();


                }

        }
}
