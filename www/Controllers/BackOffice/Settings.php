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

        private function getCurrentValuesFromDatabase(): array
        {
                $SettingModel = new SettingsModel();
                $variables = ["css:primary", "css:secondary", "css:tercery", "css:main-font1", "css:main-radius", "css:transition-duration"];
                $currentValues = [];

                foreach ($variables as $variable) {
                        $setting = $SettingModel->getOneBy(["key" => $variable]);
                        if ($setting) {
                                $value = $setting["value"];

                                $currentValues[$variable] = $value;
                        }
                }

                return $currentValues;
        }

        public function getCurrentValuesAction()
        {
                $currentValues = $this->getCurrentValuesFromDatabase();
                header('Content-Type: application/json');
                echo json_encode($currentValues);
                exit;
        }

        public function getSettings($data): void
        {
                $config = (new SettingsCSS())->getConfig();
                $configCSS = new View("BackOffice/Dashboard/settings", $data["template"]);

                $currentValues = $this->getCurrentValuesFromDatabase();

                foreach ($currentValues as $key => $value) {
                        if (isset($config["inputs"][$key])) {
                                // Définir la valeur initiale du champ du formulaire
                                $config["inputs"][$key]["attrs"]["value"] = $value;
                        }
                }

                $configCSS->assign("configSettingsForm", $config);

                if ($_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"]) {

                        $SettingModel = new SettingsModel();

                        $primary = $SettingModel->getOneBy(["key" => "css:primary"], "object");
                        $primary->setValue(htmlspecialchars($_REQUEST["css:primary"]));
                        $primary->save();

                        $secondary = $SettingModel->getOneBy(["key" => "css:secondary"], "object");
                        $secondary->setValue(htmlspecialchars($_REQUEST["css:secondary"]));
                        $secondary->save();

                        $primary = $SettingModel->getOneBy(["key" => "css:tercery"], "object");
                        $primary->setValue(htmlspecialchars($_REQUEST["css:tercery"]));
                        $primary->save();

                        $primary = $SettingModel->getOneBy(["key" => "css:main-font1"], "object");
                        $primary->setValue(htmlspecialchars($_REQUEST["css:main-font1"]));
                        $primary->save();

                        $primary = $SettingModel->getOneBy(["key" => "css:main-radius"], "object");
                        $primary->setValue(htmlspecialchars($_REQUEST["css:main-radius"]));
                        $primary->save();

                        $primary = $SettingModel->getOneBy(["key" => "css:transition-duration"], "object");
                        $primary->setValue(htmlspecialchars($_REQUEST["css:transition-duration"]));
                        $primary->save();

                        $Newconfig = (new SettingsCSS())->getConfig();
                        $NewcurrentValues = $this->getCurrentValuesFromDatabase();

                        foreach ($NewcurrentValues as $key => $value) {
                          if (isset($config["inputs"][$key])) {

                                $config["inputs"][$key]["attrs"]["value"] = $value;
                             }
                        }

                        $configCSS->assign("configSettingsForm", $Newconfig);

                }

        }

}
