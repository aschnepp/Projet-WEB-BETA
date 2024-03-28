<?php

require $_SERVER['DOCUMENT_ROOT'] . "/libs/smarty-4.5.1/libs/bootstrap.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/controller.php";

$smarty = new Smarty();
$controller = new Controller();

$entreprise = $controller->reviewEntreprise("29");

$note = $entreprise[0]->moyenne_notes;
echo "<script>var grade = '$note';</script>";

$nentreprise = 0; // Index de l'entreprise si une entreprise a plusieurs adresses

$smarty->assign("entreprise", $entreprise);
$smarty->assign("nentreprise", $nentreprise);
$smarty->display($_SERVER['DOCUMENT_ROOT'] . "/view/templates/review-entreprise.tpl");
