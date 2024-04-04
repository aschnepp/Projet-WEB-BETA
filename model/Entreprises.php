<?php

require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class Entreprises
{
    public function getEntreprisesOptions()
    {
        $Model = new Model;
        $entreprises = $Model->select("firms", ["*"], "", false);

        foreach ($entreprises as $entreprise) {
            $entrepriseNom = htmlspecialchars($entreprise->firm_name, ENT_QUOTES, 'UTF-8');
            echo "<option value='{$entrepriseNom}'>{$entrepriseNom}</option>";
        }

        return $entreprises;
    }

    public function getEntreprises()
    {
        $Model = new Model;
        $entreprises = $Model->select("firms", ["*"], "", false);

        return $entreprises;
    }
}

$Entreprises = new Entreprises;
$Entreprises->getEntreprises();
