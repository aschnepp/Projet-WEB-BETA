<?php
class Cookie
{
    private $email;
    private $password;
    private $userType;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __construct($email, $password, $userType)
    {
        $this->email = $email;
        $this->password = $password;
        $this->userType = $userType;
    }

    public function saveToCookies($remember)
    {
        $cookieData = base64_encode(json_encode(get_object_vars($this)));

        setcookie("Login", $cookieData, ($remember == "on") ? 2147483647 : 0, "/");
    }
}

$db = "stagecatalyst";
$dbHost = "31.32.226.226";
$dbPort = 3306;
$dbUser = "admin";
$dbPasswd = "Ur38sy36&*";

try {
    $pdo = new PDO('mysql:host=' . $dbHost . ';port=' . $dbPort . ';dbname=' . $db . '', $dbUser, $dbPasswd);
} catch (PDOException $e) {
}

$connexionAutho = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['souvenir']) ? $_POST['souvenir'] : 'off';

    $expression = "SELECT * FROM users WHERE email=:email";
    $requete = $pdo->prepare($expression);
    $requete->bindParam(':email', $email);
    $requete->execute();
    $resultat = $requete->fetch(PDO::FETCH_OBJ);

    if ($resultat) {
        $hashedPasswordFromDb = $resultat->password;
        if (password_verify($password, $hashedPasswordFromDb)) {
            $connexionAutho = 1;

            $expression = "
            SELECT
                    CASE
                        WHEN admins.user_id IS NOT NULL THEN 'Admin'
                        WHEN tutors.user_id IS NOT NULL THEN 'Tuteur'
                        WHEN students.user_id IS NOT NULL THEN 'Etudiant'
                        ELSE 'Utilisateur'
                    END AS typeUtilisateur
                FROM users
                LEFT JOIN tutors ON users.user_id = tutors.user_id
                LEFT JOIN admins ON users.user_id = admins.user_id
                LEFT JOIN students ON users.user_id = students.user_id
                WHERE users.email = :email;
            ";
            $requete = $pdo->prepare($expression);
            $requete->bindParam(':email', $email);
            $requete->execute();
            $resultat = $requete->fetch(PDO::FETCH_OBJ);

            switch ($resultat->typeUtilisateur) {
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
            $cookie = new Cookie($email, $password, $userType);
            $cookie->saveToCookies($remember);
        }
    }
}

if ($connexionAutho == 1) {
    http_response_code(200);
} else {
    http_response_code(400);
}


// agiannazzo0@friendfeed.com Email (ETUDIANT) 
// fM2%Q5SedD    MDP (ETUDIANT)
// $2a$04$NvjHgx/q9GY7BiI0KSbf5eAs5x4kpCgKPLefQNuuzTNR.DQ9A.rVW     MDP (BDD)

// tszymczyk1y@trellian.com (TUTEUR)
// xU3}&<yv}?P   MDP (TUTEUR)        
// $2a$04$W4VmgzS2spIADIc5esNOvOnqbaCKP/KO8xaKZYlHfPY9AeDXX38Nq     MDP (BDD)    

// chartropp2i@newsvine.com (ADMIN)
// oM3@v3_X4{nhO,2$   MDP (ADMIN)       
// $2a$04$rB3nqVuo6Y6XzneY5MxIMOvAFiZIXBdpLexU8JGsG8i2d61v0eOFa     MDP (BDD)       