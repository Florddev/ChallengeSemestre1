<?php
namespace App\Forms;
class BeginInstallation
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/",
                    "class"=>"form",
                    "id"=>"form-begin-to-install",
                ],
                "submit"=>"C'est parti !"
            ],
            "inputs"=>[
                "begin_to_install"=>[
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"hidden"
                    ],
                ]
            ]
        ];
    }
}