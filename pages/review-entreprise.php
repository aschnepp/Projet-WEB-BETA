<?php

require $_SERVER["DOCUMENT_ROOT"] . "/controller/Cookie.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/SmartyCatalyst.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/model.php";

$entrepriseID = 173; // ID de l'entreprise
$nentreprise = 0; // Index de l'entreprise si une entreprise a plusieurs adresses

$model = new Model();
$controller = new SmartyCatalyst($model);
$entreprise = $controller->reviewEntreprise($entrepriseID);

$cookie = new Cookie();
$cookie = $cookie->decodeCookieData();
$ID = $cookie->get("ID");
$note = $entreprise[0]->moyenne_notes;
echo "<script>var grade = '$note';</script>";

$review = $controller->getReview($ID, $entrepriseID);
echo "<pre>";
print_r($review);
echo "</pre>";

$controller->assign("entreprise", $entreprise);
$controller->assign("nentreprise", $nentreprise);
$controller->display($_SERVER['DOCUMENT_ROOT'] . "/view/templates/review-entreprise.tpl");
