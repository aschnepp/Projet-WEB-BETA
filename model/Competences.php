<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/model.php");

class Competences
{
    public function getCompetencesList()
    {
        $Model = new Model;
        $competences = $Model->select("skills", ["*"], "", false);

        // foreach ($competences as $competence) {
        //     $preTrim = trim($competence->skill_name);
        //     $competenceTrim = str_replace(' ', '-', strtolower($preTrim));
        //     echo "<li><input type='checkbox' id='{$competenceTrim}'>
        //     <label for='{$competenceTrim}'>
        //     $competence->skill_name
        //     </label></li>";
        // }

        return $competences;
    }

    public function getCompetences()
    {
        $Model = new Model;
        $competences = $Model->select("skills", ["*"], "", false);

        return $competences;
    }
}