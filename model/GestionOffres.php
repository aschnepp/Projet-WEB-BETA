<?php

require("{$_SERVER["DOCUMENT_ROOT"]}/model/Offre.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_SERVER['HTTP_REFERER'];
    $Offre = new Offre;

    $type = 'tutors';

    $data = [
        'nom' => $_POST['nom-offre'],
        'secteurs' => $_POST['secteurs'],
        'competences' => $_POST['competences'],
        'entreprise' => $_POST['entreprise-offre'],
        'promotions' => $_POST['promotions'],

        'rue' => $_POST['adresse-offre'],
        'numero' => $_POST['street_number-offre'],
        'codePostal' => $_POST['postal_code-offre'],
        'ville' => $_POST['locality-offre'],
        'region' => $_POST['administrative_area_level_1-offre'],

        'duree' => $_POST['duree-offre'],
        'date-debut' => $_POST['date-debut-offre'],

        'remuneration' => $_POST['remuneration-offre'],
        'nombrePlaces' => $_POST['nombre-places-offre'],

        'description' => $_POST['description-offre']
    ];

    $Offre->insertOffer($data);
    // $User->deleteOffer($id);
    // $User->modifyOffer($data, $id);
}
