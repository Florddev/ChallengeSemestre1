<?php
namespace App\Forms;
class FinishInstallation
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/",
                    "class"=>"form form-floating",
                    "id"=>"form-finish-installation",
                ],
                "submit"=>"Finaliser l'installation !"
             ],
            "inputs"=>[
                "finish_installation"=>[
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"hidden"
                    ],
                    "initOnError"=>false
                ],
                "site_name"=>[
                    "label"=>"Nom du site",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "minlen"=>2,
                    "maxlen"=>50,
                    "initOnError"=>true
                ],
                "login"=>[
                    "label"=>"Identifiant",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "minlen"=>2,
                    "maxlen"=>50,
                    "error"=>"Le login doit faire plus de 2 caractères",
                    "initOnError"=>true
                ],
                "email"=>[
                    "label"=>"Adresse email",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"email",
                        "class"=>"form-field" ,
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
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "minlen"=>8,
                    "maxlen"=>52,
                    "verify"=>true,
                    "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre",
                    "initOnError"=>false
                ],
                "passwordConfirm"=>[
                    "label"=>"Confirmation du mot de passe",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"password",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "confirm"=>"password",
                    "verify"=>true,
                    "error"=>"Votre mot de passe de confirmation ne correspond pas",
                    "initOnError"=>false
                ]
            ]
        ];
    }
}