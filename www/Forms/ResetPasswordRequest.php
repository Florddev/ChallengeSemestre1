<?php
namespace App\Forms;
class ResetPasswordRequest
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/reset-password-request",
                    "class"=>"form",
                    "id"=>"form-reset-password-request"
                ],
                "submit"=>"Obtenir mon lien de réinitialisation"
            ],
            "inputs"=>[
                "email"=>[
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"email",
                        "class"=>"input-form",
                        "placeholder"=>"Email",
                        "required"=>true,
                    ],
                    "error"=>"Le format de l'email est incorrect",
                    "initOnError"=>true
                ]
            ]
        ];
    }
}