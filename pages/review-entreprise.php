<?php

require $_SERVER['DOCUMENT_ROOT'] . "/controller/SmartyCatalyst.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/model.php";

$model = new Model();
$controller = new SmartyCatalyst($model);

$entreprise = $controller->reviewEntreprise("13");

$note = $entreprise[0]->moyenne_notes;
echo "<script>var grade = '$note';</script>";

$nentreprise = 0; // Index de l'entreprise si une entreprise a plusieurs adresses

$controller->assign("entreprise", $entreprise);
$controller->assign("nentreprise", $nentreprise);
$controller->display($_SERVER['DOCUMENT_ROOT'] . "/view/templates/review-entreprise.tpl");
