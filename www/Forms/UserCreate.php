<?php
namespace App\Forms;
use App\Enums\Role;
use App\Enums\Status;

class UserCreate
{

    public function getConfig(): array
    {
        $roleOptions = [];
        foreach (Role::cases() as $role) {
            $roleOptions[$role->name] = ["attrs"=>["value"=>(string)$role->value], "text"=>$role->name];
        }

        $statusOptions = [];
        foreach (Status::cases() as $status) {
            $statusOptions[$status->name] = ["attrs"=>["value"=>(string)$status->value], "text"=>$status->name];
        }

        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/dashboard/users/create",
                    "class"=>"form form-lg",
                    "id"=>"form-user-create",
                ],
                "submit"=>"Créer un utilisateur"
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
                "role"=>[
                    "label"=>"Rôle",
                    "balise"=>"select",
                    "attrs"=>[
                        "class"=>"form-field",
                        "required"=>true,
                        "name"=>"role",
                        "id"=>"role",
                    ],
                    "options"=>$roleOptions,
                    "error"=>"Veuillez sélectionner un rôle valide",
                    "initOnError"=>true
                ],
                "status"=>[
                    "label"=>"Statut",
                    "balise"=>"select",
                    "attrs"=>[
                        "class"=>"form-field",
                        "required"=>true,
                        "name"=>"status",
                        "id"=>"status",
                    ],
                    "options"=>$statusOptions,
                    "error"=>"Veuillez sélectionner un statut valide",
                    "initOnError"=>true
                ],  
            ]
        ];
    }
}