<?php

require $_SERVER['DOCUMENT_ROOT'] . "/controller/SmartyCatalyst.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/model.php";

$model = new Model();
$controller = new SmartyCatalyst($model);

// Récupère les 3 entreprises les plus postulées et les envoie au JS pour affichage avec API
$top = $controller->getTopFirms();
$logo1 = $top[0]->website;
$logo2 = $top[1]->website;
$logo3 = $top[2]->website;
$name1 = $top[0]->firm_name;
$name2 = $top[1]->firm_name;
$name3 = $top[2]->firm_name;
echo "<script>var logo1 = '$logo1'; var logo2 = '$logo2'; var logo3 = '$logo3'; var name1 = '$name1'; var name2 = '$name2'; var name3 = '$name3';</script>";

// Récupère la répartition des différents secteurs d'activité pour affichage avec API google chart dans le JS
$sectors = $controller->getSectors();
echo "<script>var sectors = " . json_encode($sectors) . ";</script>";

// Récupère les entreprises par région pour affichage avec API google heatmap dans le JS
$regions = $controller->getFirmRegions();
echo "<script>var regions = " . json_encode($regions) . ";</script>";

// Affiche le template
$controller->display($_SERVER['DOCUMENT_ROOT'] . "/view/templates/stats-entreprise.tpl");
