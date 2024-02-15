<?php
namespace App\Forms;
class ResetPassword
{
    private $token;

    public function __construct($token = null)
    {
        $this->token = $token;
    }

    public function getConfig(): array
    {
        $actionUrl = "/reset-password" . ($this->token ? "?token=" . urlencode($this->token) : "");

        return [
            "config" => [
                "attrs" => [
                    "method" => "POST",
                    "action" => "reset-password",
                    "class" => "form",
                    "id" => "form-reset-password"
                ],
                "submit" => "Réinitialiser le mot de passe"
            ],
            "inputs" => [
                "password" => [
                    "balise" => "input",
                    "attrs" => [
                        "type" => "password",
                        "class" => "input-form",
                        "placeholder" => "Nouveau mot de passe",
                        "required" => true,
                    ],
                    "error" => "Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre.",
                    "initOnError" => false
                ],
                "password_confirm" => [
                    "balise" => "input",
                    "attrs" => [
                        "type" => "password",
                        "class" => "input-form",
                        "placeholder" => "Confirmez le mot de passe",
                        "required" => true,
                    ],
                    "confirm"=>"password",
                    "error" => "Les mots de passe ne correspondent pas.",
                    "initOnError" => false
                ],
                "token" => [
                    "balise" => "input",
                    "attrs" => [
                        "type" => "hidden",
                        "value" => $this->token,
                        "name" => "token"
                    ]
                ],
            ]
        ];
    }
}