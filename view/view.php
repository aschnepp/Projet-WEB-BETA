<?php

include $_SERVER['DOCUMENT_ROOT'] . "/assets/back/controller/controller.php";

class View
{
    private $controller;

    public function __construct()
    {
        $this->controller = new Controller();
    }

    public function reviewEntreprise()
    {
        $data = $this->controller->reviewEntreprise();
        // Call Smarty template using the data (must create the template file first)
    }
}
