<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

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

        foreach ($secteurs as $secteur) {
            $nom = htmlspecialchars($secteur->activity_sector_name, ENT_QUOTES, 'UTF-8');
            echo "<li><input type='checkbox' name='sectors[]' id='secteur-{$secteur->activity_sector_id}'>
            <label for='secteur-{$secteur->activity_sector_id}'>
            $nom
            </label></li>";
        }

        return $secteurs;
    }
}
