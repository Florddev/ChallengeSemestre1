<?php
namespace App\Forms;

class ArticleDeleteConfirm
{
    protected $articleId;

    public function __construct($articleId = null)
    {
        $this->articleId = $articleId;
    }

    public function getConfig(): array
    {
        $actionPath = "/dashboard/articles/delete" . ($this->articleId ? "/{$this->articleId}" : "");

        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>$actionPath,
                    "class"=>"form-delete-article",
                    "id"=>"form-delete-article",
                ],
                "submit"=>"Confirmer la suppression",
                "cancel"=>"/dashboard/articles",
            ],
            "inputs"=>[
                "id"=>[
                    "label"=>"",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"hidden",
                        "name"=>"id",
                        "value"=>$this->articleId,
                    ],
                ],
            ]
        ];
    }
}