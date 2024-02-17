<?php
namespace App\Forms;

class UserDeleteAccount
{
    public function getConfig(): array
    {
        return [
            "config" => [
                "attrs" => [
                    "method" => "POST",
                    "action" => "/delete-account",
                    "class" => "form",
                    "id" => "form-delete-account"
                ],
                "submit" => "Supprimer définitivement le compte"
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