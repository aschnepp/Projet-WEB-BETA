<?php
require("{$_SERVER["DOCUMENT_ROOT"]}/controller/Cookie.php");
require("{$_SERVER["DOCUMENT_ROOT"]}/model/User.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['souvenir']) ? $_POST['souvenir'] : 'off';

    $condition = "email = '{$email}'";

    $User = new User;
    $resultat = $User->selectFromUser(["*"], $condition, true);
    $ID = $resultat->user_id;

    if ($resultat) {
        $connexionAutho = 1;
        $hashedPasswordFromDb = $resultat->password;
        if (password_verify($password, $hashedPasswordFromDb)) {
            $connexionAutho = 1;

            $typeUser = $Model->userTypeGet($ID);

            switch ($typeUser->typeUtilisateur) {
                case "Admin":
                    $userType = "Admin";
                    break;
                case "Tuteur":
                    $userType = "Tuteur";
                    break;
                case "Etudiant":
                    $userType = "Etudiant";
                    break;
                default:
                    $userType = "Utilisateur";
            }

            $cookie = new Cookie($ID, $email, $password, $userType);
            $cookie->saveToCookies($remember);
        }
    }
} else {
    $connexionAutho = 0;
}

if ($connexionAutho == 1) {
    http_response_code(200);
} else {
    http_response_code(400);
}