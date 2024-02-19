<?php
namespace App\Forms;
use App\Enums\Role;
use App\Enums\Status;

class UserEdit
{
    protected $userData;

    public function __construct($userData = [])
    {
        $this->userData = $userData;
    }

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
                "role"=>[
                    "label"=>"Rôle",
                    "balise"=>"select",
                    "attrs"=> [
                        "name"=>"role",
                        "id"=>"role",
                        "class"=>"form-field" ,
                    ],
                    "options"=>$roleOptions,
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
                    "options"=>$statusOptions,
                    "selected"=>$this->userData['status'] ?? '',
                ],
            ]
        ];
    }
}