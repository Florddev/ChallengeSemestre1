<?php
namespace App\Forms;

class UserDeactivateAccount
{
    public function getConfig(): array
    {
        return [
            "config" => [
                "attrs" => [
                    "method" => "POST",
                    "action" => "/deactivate-account",
                    "class" => "form",
                    "id" => "form-deactivate-account"
                ],
                "submit" => "Désactiver le compte"
            ],
            "inputs" => [
                "password"=>[
                    "label"=>"Mot de passe",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"password",
                        "class"=>"form-field",
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "verify"=>true,
                    "error"=>"Votre mot de passe est requis",
                    "initOnError"=>false
                ],
                "passwordConfirm"=>[
                    "label"=>"Confirmation du mot de passe",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"password",
                        "class"=>"form-field",
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "verify"=>true,
                    "confirm"=>"password",
                    "error"=>"Votre mot de passe de confirmation ne correspond pas",
                    "initOnError"=>false
                ],
            ],
        ];
    }
}