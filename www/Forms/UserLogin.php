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
                    "class"=>"form form-lg",
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
                        "class"=>"form-field",
                        "placeholder"=>"",
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
                        "class"=>"form-field",
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre",
                    "initOnError"=>false
                ],
            ]
        ];
    }
}