<?php
require("{$_SERVER["DOCUMENT_ROOT"]}/model/User.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_SERVER['HTTP_REFERER'];
    $User = new User;

    if (str_contains($url, "etudiant")) {
        $type = 'students';

        $data = [
            'nom' => $_POST['nom-etudiant'],
            'prenom' => $_POST['prenom-etudiant'],
            'email' => $_POST['email-etudiant'],
            'telephone' => $_POST['numero-telephone-etudiant'],
            'dateNaissance' => $_POST['date-naissance-etudiant'],

            'rue' => $_POST['adresse-etudiant'],
            'numero' => $_POST['street_number-etudiant'],
            'codePostal' => $_POST['postal_code-etudiant'],
            'ville' => $_POST['locality-etudiant'],
            'region' => $_POST['administrative_area_level_1-etudiant'],

            'campus' => $_POST['centre-etudiant'],
            'promotion' => $_POST['promotion-etudiant']
        ];

        $User->insertUser($data, $type);
        // $User->deleteUser($id);
        // $User->modifyUser($data, $id);
    } else if (str_contains($url, "tuteur")) {
        $type = 'tutors';

        $data = [
            'nom' => $_POST['nom-tuteur'],
            'prenom' => $_POST['prenom-tuteur'],
            'email' => $_POST['email-tuteur'],
            'telephone' => $_POST['numero-telephone-tuteur'],
            'dateNaissance' => $_POST['date-naissance-tuteur'],

            'rue' => $_POST['adresse-tuteur'],
            'numero' => $_POST['street_number-tuteur'],
            'codePostal' => $_POST['postal_code-tuteur'],
            'ville' => $_POST['locality-tuteur'],
            'region' => $_POST['administrative_area_level_1-tuteur'],

            'campus' => $_POST['centre-tuteur'],
            'promotions' => $_POST['promotions']
        ];

        $User->insertUser($data, $type);
        // $User->deleteUser($id);
        // $User->modifyUser($data, $id);
    } else {
        exit('Vous ne pouvez pas gérer les admins');
    }
}


// $User = new User();
// $User->deleteUser(151);