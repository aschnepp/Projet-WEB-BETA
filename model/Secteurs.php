<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class Secteurs
{
    private Model $Model;

    public function __construct(Model $model)
    {
        $this->Model = $model;
    }

    public function getSecteurs(): array
    {
        $secteurs = $this->Model->select("activity_sectors", ["*"], "", false, [PDO::FETCH_COLUMN, 1]);

        return $secteurs;
    }
}
