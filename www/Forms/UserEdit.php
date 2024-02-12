<?php
namespace App\Forms;

class UserEdit
{
    protected $userData;

    public function __construct($userData = [])
    {
        $this->userData = $userData;
    }

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/dashboard/users/edit/" . ($this->userData['id'] ?? ''),
                    "class"=>"form form-lg",
                    "id"=>"form-user-edit",
                ],
                "submit"=>"Mettre à jour",
            ],
            "inputs"=>[
                "id"=>[
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"hidden",
                        "name"=>"id",
                        "value"=>$this->userData['id'] ?? '',
                    ],
                ],
                "login"=>[
                    "label"=>"Login",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "name"=>"login",
                        "class"=>"form-field",
                        "value"=>$this->userData['login'] ?? '',
                        "required"=>true,
                        "id"=>"login",
                    ],
                ],
                "email"=>[
                    "label"=>"Email",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"email",
                        "name"=>"email",
                        "class"=>"form-field",
                        "value"=>$this->userData['email'] ?? '',
                        "required"=>true,
                        "id"=>"email",
                    ],
                ],
                "password"=>[
                    "label"=>"Mot de passe (laisser vide pour ne pas changer)",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"password",
                        "name"=>"password",
                        "id"=>"password",
                        "class"=>"form-field",
                    ],
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
                    "selected"=>$this->userData['validate'] ?? '',
                    "error"=>"Veuillez sélectionner une option valide",
                    "initOnError"=>true
                ],
                "role"=>[
                    "label"=>"Rôle",
                    "balise"=>"select",
                    "attrs"=> [
                        "name"=>"role",
                        "id"=>"role",
                        "class"=>"form-field" ,
                    ],
                    "options"=>[
                        "User"=>["attrs"=>["value"=>"0"], "text"=>"User"],
                        "Author"=>["attrs"=>["value"=>"1"], "text"=>"Author"],
                        "Moderator"=>["attrs"=>["value"=>"2"], "text"=>"Moderator"],
                        "Admin"=>["attrs"=>["value"=>"3"], "text"=>"Admin"],
                    ],
                    "selected"=>$this->userData['role'] ?? '',
                ],
                "status"=>[
                    "label"=>"Statut",
                    "balise"=>"select",
                    "attrs"=> [
                        "name"=>"status",
                        "id"=>"status",
                        "class"=>"form-field" ,
                    ],
                    "options"=>[
                        "Actif"=>["attrs"=>["value"=>"0"], "text"=>"Actif"],
                        "Inactif"=>["attrs"=>["value"=>"1"], "text"=>"Inactif"],
                    ],
                    "selected"=>$this->userData['status'] ?? '',
                ],
            ]
        ];
    }
}