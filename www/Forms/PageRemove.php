<?php
namespace App\Forms;

class PageRemove
{
    private int $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function getConfig(): array
    {
        $actionPath = "/dashboard/pages/delete" . ($this->id ? "/{$this->id}" : "");

        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>$actionPath,
                    "class"=>"form form-lg",
                    "id"=>"form-page-remove",
                ],
                "submit"=>"Supprimer la page"
            ],
            "inputs"=>[
            ]
        ];
    }
}