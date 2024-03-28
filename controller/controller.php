<?php

include $_SERVER['DOCUMENT_ROOT'] . "/model/model.php";

class Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Model("stagecatalyst", "31.32.226.226", 3306, "admin", "Ur38sy36&*");
    }

    public function reviewEntreprise($id)
    {
        return $this->model->callProcedure("GetFirmInfo", [$id]);
    }
}
