<?php
namespace App\Forms;

class UserCreate
{

    public function getConfig(): array
    {
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
                "validate"=>[
                    "label"=>"Validé",
                    "balise"=>"select",
                    "attrs"=>[
                        "class"=>"form-field",
                        "name"=>"validate",
                        "id"=>"validate",
                    ],
                    "options"=>[
                        "Oui"=>["attrs"=>["value"=>"1"], "text"=>"Oui"],
                        "Non"=>["attrs"=>["value"=>"0"], "text"=>"Non"],
                    ],
                    "error"=>"Veuillez sélectionner une option valide",
                    "initOnError"=>true
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
                    "options"=>[
                        "User"=>["attrs"=>["value"=>"0"], "text"=>"User"],
                        "Author"=>["attrs"=>["value"=>"1"], "text"=>"Author"],
                        "Moderator"=>["attrs"=>["value"=>"2"], "text"=>"Moderator"],
                        "Admin"=>["attrs"=>["value"=>"3"], "text"=>"Admin"],
                    ],
                    "error"=>"Veuillez sélectionner un rôle valide",
                    "initOnError"=>true
                ],
                "status"=>[
                    "label"=>"Statut",
                    "balise"=>"select",
                    "attrs"=>[
                        "class"=>"form-field",
                        "required"=>true,
                        "name"=>"status", // Assurez-vous que l'attribut name est défini ici plutôt que dans chaque option
                        "id"=>"status", // Optionnellement, vous pouvez aussi définir un ID pour le select
                    ],
                    "options"=>[
                        "Actif"=>["attrs"=>["value"=>"0"], "text"=>"Actif"],
                        "Inactif"=>["attrs"=>["value"=>"1"], "text"=>"Inactif"],
                    ],
                    "error"=>"Veuillez sélectionner un statut valide",
                    "initOnError"=>true
                ],  
            ]
        ];
    }
}