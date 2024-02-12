<?php
namespace App\Forms;

class UserDeleteConfirm
{
    protected $userId;

    public function __construct($userId = null)
    {
        $this->userId = $userId;
    }

    public function getConfig(): array
    {
        $actionPath = "/dashboard/users/delete" . ($this->userId ? "/{$this->userId}" : "");

        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>$actionPath,
                    "class"=>"form-delete-user",
                    "id"=>"form-delete-user",
                ],
                "submit"=>"Confirmer la suppression",
                "cancel"=>"/dashboard/users",
            ],
            "inputs"=>[
                "id"=>[
                    "label"=>"",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"hidden",
                        "name"=>"id",
                        "value"=>$this->userId,
                    ],
                ],
            ]
        ];
    }
}