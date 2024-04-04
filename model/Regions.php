<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class Regions
{
    private Model $Model;

    public function __construct(Model $model)
    {
        $this->Model = $model;
    }

    public function getRegions()
    {
        $Model = new Model;
        $regions = $Model->select("regions", ["*"], "", false, [PDO::FETCH_COLUMN, 1]);

        return $regions;
    }
}
