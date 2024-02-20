<?php
namespace App\Forms;

use App\Models\Category;

class ArticleCreate
{

    public function getConfig(): array
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        $categoriesOptions = [];
        foreach ($categories as $category) {
            $categoriesOptions[$category["label"]] = [
                    "attrs" => [
                        "value" => $category["id"]
                    ],
            ];
        }

        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/dashboard/articles/create",
                    "class"=>"form form-lg",
                    "id"=>"form-article-create",
                ],
                "submit"=>"Créer un article"
            ],
            "inputs"=>[
                "title"=>[
                    "label"=>"Titre",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "minlen"=>2,
                    "maxlen"=>170,
                    "error"=>"Le label doit faire plus de 2 caractères",
                    "initOnError"=>true
                ],
                "content"=>[
                    "label"=>"Contenu",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "minlen"=>2,
                    "maxlen"=>255,
                    "error"=>"Le contenu doit faire plus de 2 caractères",
                    "initOnError"=>true
                ],
                "keywords"=>[
                    "label"=>"Mots clés",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "minlen"=>2,
                    "maxlen"=>255,
                    "error"=>"Les mots clés doivent faire plus de 2 caractères",
                    "initOnError"=>true
                ],
                "picture_url"=>[
                    "label"=>"URL de l'image",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "minlen"=>2,
                    "maxlen"=>255,
                    "error"=>"L'URL de l'image doit faire plus de 2 caractères",
                    "initOnError"=>true
                ],
                "id_category"=>[
                    "label"=>"Catégorie",
                    "balise"=>"select",
                    "attrs"=>[
                        "class"=>"form-field",
                        "required"=>true,
                        "name"=>"id_category",
                        "id"=>"id_category",
                    ],
                    "options"=>$categoriesOptions,
                    "error"=>"Veuillez sélectionner une catégorie",
                    "initOnError"=>true
                ],
            ]
        ];
    }
}