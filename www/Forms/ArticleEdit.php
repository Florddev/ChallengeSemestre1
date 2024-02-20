<?php
namespace App\Forms;

class ArticleEdit
{
    protected $articleData;

    public function __construct($articleData = [])
    {
        $this->articleData = $articleData;
    }

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/dashboard/articles/edit/" . ($this->articleData['id'] ?? ''),
                    "class"=>"form form-lg",
                    "id"=>"form-article-edit",
                ],
                "submit"=>"Mettre à jour",
            ],
            "inputs"=>[
                "id"=>[
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"hidden",
                        "name"=>"id",
                        "value"=>$this->articleData['id'] ?? '',
                    ],
                ],
                "title"=>[
                    "label"=>"Titre",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "name"=>"title",
                        "class"=>"form-field",
                        "value"=>$this->articleData['title'] ?? '',
                        "required"=>true,
                        "id"=>"title",
                    ],
                ],
                "content"=>[
                    "label"=>"Contenu",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "name"=>"content",
                        "class"=>"form-field",
                        "value"=>$this->articleData['content'] ?? '',
                        "required"=>true,
                        "id"=>"content",
                    ],
                ],
                "keywords"=>[
                    "label"=>"Mots clés",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "name"=>"keywords",
                        "class"=>"form-field",
                        "value"=>$this->articleData['keywords'] ?? '',
                        "required"=>true,
                        "id"=>"keywords",
                    ],
                ],
                "picture_url"=>[
                    "label"=>"URL de l'image",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "name"=>"picture_url",
                        "class"=>"form-field",
                        "value"=>$this->articleData['picture_url'] ?? '',
                        "required"=>true,
                        "id"=>"picture_url",
                    ],
                ],
                "id_category"=>[
                    "label"=>"Categorie",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "name"=>"id_category",
                        "class"=>"form-field",
                        "value"=>$this->articleData['id_category'] ?? '',
                        "required"=>true,
                        "id"=>"id_category",
                    ],
                ],
            ]
        ];
    }
}