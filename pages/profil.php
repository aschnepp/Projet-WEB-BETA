<?php

require $_SERVER["DOCUMENT_ROOT"] . "/controller/Cookie.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/SmartyCatalyst.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/User.php";

// Initialisation des classes
$user = new User();
$controller = new SmartyCatalyst($user);
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

// Calculate age from birthdate
$birthdate = new DateTime($birthday);
$currentDate = new DateTime();
$age = $birthdate->diff($currentDate)->y;
$addresse = $controller->getAddresse($data->address_id)[0];
$formattedAddress = $addresse->street_number . " " . $addresse->street_name . ", " . $addresse->postal_code . " " . $addresse->city_name;
$type = $user->userTypeGet($ID)->typeUtilisateur;

switch ($type) {
    case "admins":
        break;
    case "tutors":
        $infosSupp = $controller->getTuteur($ID);
        $campus = $infosSupp[0]->campus_name;
        $promos = "";
        for ($i = 0; $i < count($infosSupp); $i++) {
            $promos .= $infosSupp[$i]->promotion_name . " ";
        }
        $controller->assign("campus", $campus);
        $controller->assign("promos", $promos);
        break;
    case "students":
        $infosSupp = $controller->getStudent($ID);
        $campus = $infosSupp[0]->campus_name;
        $promo = $infosSupp[0]->promotion_name;
        $candidature = $infosSupp[0]->nbCandidatures;
        $stage = $infosSupp[0]->nbStages;
        $controller->assign("campus", $campus);
        $controller->assign("promo", $promo);
        $controller->assign("candidature", $candidature);
        $controller->assign("stage", $stage);
        break;
    default:
        break;
}

// Transfert de données vers le template
$controller->assign("email", $email);
$controller->assign("nom", $nom);
$controller->assign("prenom", $prenom);
$controller->assign("tel", $tel);
$controller->assign("birthday", $birthday);
$controller->assign("age", $age);
$controller->assign("formattedAddress", $formattedAddress);
$controller->assign("type", $type);
$controller->display($_SERVER['DOCUMENT_ROOT'] . "/view/templates/profil.tpl");
