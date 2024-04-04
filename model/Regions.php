<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class Regions
{
    public function getRegionsOptions()
    {
        $Model = new Model;
        $regions = $Model->select("regions", ["*"], "", false);

        foreach ($regions as $region) {
            $regionNom = htmlspecialchars($region->region_name, ENT_QUOTES, 'UTF-8');
            echo "<option value='{$regionNom}'>{$regionNom}</option>";
        }

        return $regions;
    }

    public function getRegions()
    {
        $Model = new Model;
        $regions = $Model->select("regions", ["*"], "", false);

        return $regions;
    }
}
