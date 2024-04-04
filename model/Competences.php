<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class Competences
{
    public function getCompetencesList()
    {
        $Model = new Model;
        $competences = $Model->select("skills", ["*"], "", false);

        // foreach ($competences as $competence) {
        //     $preTrim = trim(htmlspecialchars($competence->skill_name, ENT_QUOTES, 'UTF-8'));
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