<?php
// require("{$_SERVER["DOCUMENT_ROOT"]}/controller/cookies.php");

// $Cookie = new Cookie();
// var_dump($Cookie);

// $Cookie = $Cookie->decodeCookieData();
// var_dump($Cookie);



require("{$_SERVER["DOCUMENT_ROOT"]}/model/User.php");



// $condition = "user_id = 101";
// $user = $Model->selectFromUser(["*"], $condition, true);


// $hash = password_hash($user->password, CRYPT_BLOWFISH);

// $Model->insert()



if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $User = new User();
    $type = 'Student';
    $User->insertUser($data, $type);
}