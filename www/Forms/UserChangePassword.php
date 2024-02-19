<?php
namespace App\Forms;

class UserChangePassword
{
    public function getConfig(): array
    {
        return [
            "config" => [
                "attrs" => [
                    "method" => "POST",
                    "action" => "change-password",
                    "class" => "form",
                    "id" => "form-change-password"
                ],
                "submit" => "Modifier le mot de passe"
            ],
            "inputs" => [
                "currentPassword" => [
                    "label"=>"Mot de passe actuel",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"password",
                        "class"=>"form-field",
                        "required"=>true,
                    ],
                    "error"=>"Le mot de passe actuel est requis",
                    "initOnError"=>false
                ],
                "newPassword" => [
                    "label" => "Nouveau mot de passe",
                    "balise" => "input",
                    "attrs" => [
                        "type" => "password",
                        "class" => "form-field",
                        "required" => true,
                    ],
                    "minlen" => 8,
                    "maxlen" => 52,
                    "verify"=>true,
                    "error" => "Le nouveau mot de passe doit faire plus de 8 caractères avec minuscule et chiffre",
                    "initOnError" => true
                ],
                "newPasswordConfirm" => [
                    "label" => "Confirmation du nouveau mot de passe",
                    "balise" => "input",
                    "attrs" => [
                        "type" => "password",
                        "class" => "form-field",
                        "required" => true,
                    ],
                    "verify"=>true,
                    "confirm" => "newPassword",
                    "error" => "Votre mot de passe de confirmation ne correspond pas",
                    "initOnError" => true
                ]
            ]
        ];
    }
}