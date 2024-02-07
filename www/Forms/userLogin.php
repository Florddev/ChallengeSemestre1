<?php
namespace App\Forms;
class UserLogin
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/login",
                    "class"=>"form",
                    "id"=>"form-login"
                ],
                "submit"=>"Se connecter"
            ],
            "inputs"=>[
                "email"=>[
                    "label"=>"Adresse Email",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"email",
                        "class"=>"input-form",
                        "placeholder"=>"Email",
                        "required"=>true,
                    ],
                    "error"=>"Le format de l'email est incorrect",
                    "initOnError"=>true
                ],
                "password"=>[
                    "label"=>"Mot de passe",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"password",
                        "class"=>"input-form",
                        "placeholder"=>"Mot de passe",
                        "required"=>true,
                    ],
                    "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre",
                    "initOnError"=>false
                ],
            ]
        ];
    }
}