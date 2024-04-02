<?php

require $_SERVER['DOCUMENT_ROOT'] . "/controller/SmartyCatalyst.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/model.php";

$model = new Model();
$controller = new SmartyCatalyst($model);

// Récupère les 3 offres les plus wishlisted et les envoie au JS pour affichage avec API
$top = $controller->getTopOffers();
$logo1 = $top[0]->website;
$logo2 = $top[1]->website;
$logo3 = $top[2]->website;
$name1 = $top[0]->title;
$name2 = $top[1]->title;
$name3 = $top[2]->title;
echo "<script>var logo1 = '$logo1'; var logo2 = '$logo2'; var logo3 = '$logo3'; var name1 = '$name1'; var name2 = '$name2'; var name3 = '$name3';</script>";

// Récupère les différentes durées et leur total pour affichage avec API google chart dans le JS
$durations = $controller->getDurationStage();
echo "<script>var durations = " . json_encode($durations) . ";</script>";

// Récupère les promotions et leur total pour affichage avec API google chart dans le JS
$promotions = $controller->getPromotions();
echo "<script>var promotions = " . json_encode($promotions) . ";</script>";

// Récupère les compétences et leur total pour affichage avec API google chart dans le JS
$skills = $controller->getSkills();
echo "<script>var skills = " . json_encode($skills) . ";</script>";

// Récupère les offres par région pour affichage avec API google heatmap dans le JS
$regions = $controller->getOffersRegions();
echo "<script>var regions = " . json_encode($regions) . ";</script>";

// Affiche le template
$controller->display($_SERVER['DOCUMENT_ROOT'] . "/view/templates/stats-offres.tpl");
