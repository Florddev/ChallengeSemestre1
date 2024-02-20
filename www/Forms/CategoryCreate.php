<?php
namespace App\Forms;

class CategoryCreate
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/dashboard/categories/create",
                    "class"=>"form form-lg",
                    "id"=>"form-user-create",
                ],
                "submit"=>"Créer une catégorie"
            ],
            "inputs"=>[
                "label"=>[
                    "label"=>"Label",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "minlen"=>2,
                    "maxlen"=>50,
                    "error"=>"Le label doit faire plus de 2 caractères",
                    "initOnError"=>true
                ],
            ]
        ];
    }
}