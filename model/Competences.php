<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class Competences
{
    public function getCompetencesList()
    {
        $Model = new Model;
        $competences = $Model->select("skills", ["*"], "", false);

        foreach ($competences as $competence) {
            echo "<li><input type='checkbox' name='competences[]' id='competence-{$competence->skill_id}'>
            <label for='competence-{$competence->skill_id}'>
            $competence->skill_name
            </label></li>";
        }

        return $competences;
    }

    public function getCompetences()
    {
        $Model = new Model;
        $competences = $Model->select("skills", ["*"], "", false);

        return $competences;
    }
}
