<?php

namespace App\Core;

class View
{
    private String $templateName;
    private String $viewName;

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

    public function __destruct()
    {
        if(empty($this->templateName)) include $this->viewName;
        else include $this->templateName;
    }

}