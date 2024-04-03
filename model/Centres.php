<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class Centres
{
    public function getCentresOptions()
    {
        $Model = new Model;
        $centres = $Model->select("campus", ["*"], "", false);

        foreach ($centres as $centre) {
            $centreNom = htmlspecialchars($centre->campus_name, ENT_QUOTES, 'UTF-8');
            $liste = "<option value='{$centreNom}'>{$centreNom}</option>";
            echo $liste;
        }

        return $centres;
    }

    public function getCentres()
    {
        $Model = new Model;
        $centres = $Model->select("campus", ["*"], "", false);

        return $centres;
    }
}