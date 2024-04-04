<?php

require $_SERVER["DOCUMENT_ROOT"] . "/controller/Cookie.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/SmartyCatalyst.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/User.php";

// Initialisation des classes
$model = new Model();
$controller = new SmartyCatalyst($model);
$cookie = new Cookie();

// Récupération des données
$cookie = $cookie->decodeCookieData();
$ID = $cookie->get("ID");
$data = $controller->getProfil($ID);

$email = $data->email;
$nom = $data->name;
$prenom = $data->surname;
$tel = $data->phone_number;
$birthday = $data->birthdate;
$addresse = $controller->getAddresse($data->address_id)[0];
$formattedAddress = $addresse->street_number . " " . $addresse->street_name . ", " . $addresse->postal_code . " " . $addresse->city_name;
$type = $model->userTypeGet($ID)->typeUtilisateur;

switch ($type) {
    case "Admin":
        break;
    case "Tuteur":
        $infosSupp = $controller->getTuteur($ID);
        var_dump($infosSupp);
        break;
    case "Etudiant":
        $infosSupp = $controller->getStudent($ID);
        //var_dump($infosSupp);
        break;
    default:
        break;
}

// Transfert de données vers le template
$controller->assign("comment", $comment);
$controller->display($_SERVER['DOCUMENT_ROOT'] . "/view/templates/profil.tpl");
