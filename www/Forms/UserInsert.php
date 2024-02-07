<?php
namespace App\Forms;
class UserInsert
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/register",
                    "class"=>"form form-lg",
                    "id"=>"form-register",
                ],
                "submit"=>"Créer un compte"
             ],
            "inputs"=>[
                "login"=>[
                    "label"=>"Login",
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
                        "class"=>"form-field",
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "verify"=>true,
                    "confirm"=>"password",
                    "error"=>"Votre mot de passe de confirmation ne correspond pas",
                    "initOnError"=>false
                ],

                /*
                "selectExemple"=>[
                    "balise"=>"select",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"input-form" ,
                        "placeholder"=>"Prénom",
                        "required"=>"",
                    ],
                    "options"=> [
                        "option1"=>[
                            "attrs"=> [
                                "type"=>"password",
                                "class"=>"input-form",
                                "placeholder"=>"Confirmation",
                                "selected"=>""
                            ]
                        ],
                        "option2"=>[
                            "attrs"=> [
                                "type"=>"password",
                                "class"=>"input-form",
                                "placeholder"=>"Confirmation"
                            ]
                        ],
                    ],
                    "error"=>"Le prénom doit faire plus de 2 caractères"
                ],
                */
            ]
        ];
    }
}