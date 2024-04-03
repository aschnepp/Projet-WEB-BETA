<?php

require "{$_SERVER["DOCUMENT_ROOT"]}/libs/smarty/libs/bootstrap.php";

class SmartyCatalyst extends Smarty
{

    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir("{$_SERVER["DOCUMENT_ROOT"]}/view/templates/");
        $this->setCompileDir("{$_SERVER["DOCUMENT_ROOT"]}/build/");
        $this->setCacheDir("{$_SERVER["DOCUMENT_ROOT"]}/cache/");

        $this->setEscapeHtml(true);


        #TODO : REMOVE THIS COMMENT WHEN READY FOR PRODUCTION
        #$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
    }
}