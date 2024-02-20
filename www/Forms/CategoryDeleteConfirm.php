<?php
namespace App\Forms;

class CategoryDeleteConfirm
{
    protected $categoryId;

    public function __construct($categoryId = null)
    {
        $this->categoryId = $categoryId;
    }

    public function getConfig(): array
    {
        $actionPath = "/dashboard/categories/delete" . ($this->categoryId ? "/{$this->categoryId}" : "");

        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>$actionPath,
                    "class"=>"form-delete-category",
                    "id"=>"form-delete-category",
                ],
                "submit"=>"Confirmer la suppression",
                "cancel"=>"/dashboard/categories",
            ],
            "inputs"=>[
                "id"=>[
                    "label"=>"",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"hidden",
                        "name"=>"id",
                        "value"=>$this->categoryId,
                    ],
                ],
            ]
        ];
    }
}