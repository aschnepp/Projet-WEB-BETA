<?php
require $_SERVER["DOCUMENT_ROOT"] . "/controller/Cookie.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/SmartyCatalyst.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/Model.php";

// Temporaire
$entrepriseID = 13; // ID de l'entreprise
$nentreprise = 0; // Index de l'entreprise si une entreprise a plusieurs adresses

// Initialisation des classes
$model = new Model();
$controller = new SmartyCatalyst($model);
$cookie = new Cookie();

// Récupération des données
$entreprise = $controller->reviewEntreprise($entrepriseID);
$cookie = $cookie->decodeCookieData();
$ID = $cookie->get("ID");
$note = $entreprise[0]->moyenne_notes;
$review = $controller->getReview($ID, $entrepriseID);

// Si l'utilisateur a déjà donné un avis
if (!empty($review)) {
    $alreadyReviewed = true;
    $grade = $review[0]->note;
    $comment = $review[0]->comment;
} else {
    $alreadyReviewed = false;
    $grade = 0;
    $comment = "";
}

// Transfert de données vers le JS
echo "<script>var note = '$note';</script>";
echo "<script>var grade = $grade;</script>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grade = $_POST["rating"];
    $comment = $_POST["motiv"];
    $controller->giveReview($ID, $entrepriseID, $grade, $comment, $alreadyReviewed);
}

// Transfert de données vers le template
$controller->assign("comment", $comment);
$controller->assign("entreprise", $entreprise);
$controller->assign("nentreprise", $nentreprise);
$controller->display($_SERVER['DOCUMENT_ROOT'] . "/view/templates/review-entreprise.tpl");
