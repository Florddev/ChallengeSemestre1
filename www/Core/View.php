<?php

namespace App\Core;

class View
{
    private String $templateName;
    private String $viewName;
    private array $data = [];

    public function __construct(string $viewName, string $templateName = "")
    {
        $this->setViewName($viewName);
        $this->setTemplateName($templateName);
    }

    /**
     * @param String $templateName
     */
    public function setTemplateName(string $templateName): void
    {
        if(empty($templateName))
        {
            $this->templateName = $templateName;
            return;
        }
        elseif(!file_exists("Views/Template/".$templateName.".tpl.php"))
        {
            die("Le template Views/Template/".$templateName.".tpl.php n'existe pas");
        }
        $this->templateName = "Views/Template/".$templateName.".tpl.php";
    }

    /**
     * @param String $viewName
     */
    public function setViewName(string $viewName): void
    {
        if(!file_exists("Views/".$viewName.".view.php"))
        {
            die("Le vue Views/".$viewName.".view.php n'existe pas");
        }
        $this->viewName = "Views/".$viewName.".view.php";
    }

    public function assign(string $key, $value): void
    {
        $this->data[$key]=$value;
    }

    public function partial(String $partielView, array $data)
    {
        if(!file_exists("Views/Partial/".$partielView.".partialView.php"))
        {
            die("Le vue partiel 'Views/Partial/".$partielView.".partialView.php' n'existe pas");
        }
        include "Views/Partial/".$partielView.".partialView.php";

        $this->assign("data", $data);
    }

    public function includeComponent(string $component, array $config, array $data = []): void
    {
        if(!file_exists("Views/Components/".$component.".php"))
        {
            die("Le composant Views/Components/".$component.".php n'existe pas");
        }
        include "Views/Components/".$component.".php";
    }

    public function __destruct()
    {
        extract($this->data);
        if(empty($this->templateName)) include $this->viewName;
        else include $this->templateName;
    }
}