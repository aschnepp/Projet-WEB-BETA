<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/model.php");

class Secteurs
{
    public function getSecteurs()
    {
        $Model = new Model;
        $secteurs = $Model->select("activity_sectors", ["*"], "", false);

        return $secteurs;
    }

    public function getSecteursList()
    {
        $Model = new Model;
        $secteurs = $Model->select("activity_sectors", ["*"], "", false);

        // foreach ($secteurs as $secteur) {
        //     $preTrim = trim($secteur->activity_sector_name);
        //     $nomTrim = str_replace(' ', '-', strtolower($preTrim));
        //     echo "<li><input type='checkbox' id='{$nomTrim}'>
        //     <label for='{$nomTrim}'>
        //     $secteur->activity_sector_name
        //     </label></li>";
        // }

        return $secteurs;
    }
}