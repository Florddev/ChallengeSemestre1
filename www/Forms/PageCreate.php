<?php
namespace App\Forms;

class PageCreate
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/dashboard/pages/create",
                    "class"=>"form form-lg",
                    "id"=>"form-page-create",
                ],
                "submit"=>"Créer la page"
            ],
            "inputs"=>[
                "title"=>[
                    "label"=>"Titre",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"Titre de la page",
                        "required"=>true,
                    ],
                    "minlen"=>3,
                    "maxlen"=>255,
                    "initOnError"=>true
                ],
                "url"=>[
                    "label"=>"Url",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field",
                        "placeholder"=>"Exemple: /login",
                        "required"=>true,
                    ],
                    "minlen"=>1,
                    "maxlen"=>50,
                    "initOnError"=>true
                ],
                "description"=>[
                    "label"=>"Description",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field",
                        "placeholder"=>"Description/Resumé de la page",
                        "required"=>true,
                    ],
                    "minlen"=>1,
                    "initOnError"=>true
                ],
            ]
        ];
    }
}