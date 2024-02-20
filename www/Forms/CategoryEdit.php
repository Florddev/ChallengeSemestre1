<?php
namespace App\Forms;

class CategoryEdit
{
    protected $categoryData;

    public function __construct($categoryData = [])
    {
        $this->categoryData = $categoryData;
    }

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/dashboard/articles/categories/edit/" . ($this->categoryData['id'] ?? ''),
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
                        "value"=>$this->categoryData['id'] ?? '',
                    ],
                ],
                "label"=>[
                    "label"=>"Label",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "name"=>"label",
                        "class"=>"form-field",
                        "value"=>$this->categoryData['label'] ?? '',
                        "required"=>true,
                        "id"=>"label",
                    ],
                ],
            ]
        ];
    }
}