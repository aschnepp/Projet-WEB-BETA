<?php

include("{$_SERVER["DOCUMENT_ROOT"]}/controller/SmartyCatalyst.php");

$model = new Model();
$smarty = new SmartyCatalyst($model);

# firm_id = 125 et user_id = 1 pour une entreprise avec review

$id = 125;
$user_id = 1;

$smarty->assign("entreprise", $smarty->getFirmInfo($id));
$smarty->assign("addresses", $smarty->getFirmAdresses($id));

$smarty->assign("listeSecteurs", $smarty->getSectors());
$smarty->assign("listeSecteursChecked", $smarty->getFirmSectors($id));

$smarty->assign("review", $smarty->getFirmReviews($id, $user_id));
$smarty->assign("regions", $smarty->getAllRegion());

$smarty->assign("user_id", $user_id);

$smarty->display("{$_SERVER["DOCUMENT_ROOT"]}/view/templates/gestion-entreprise.tpl");
