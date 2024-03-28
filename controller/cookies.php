<?php
require("{$_SERVER["DOCUMENT_ROOT"]}/assets/back/model/model.php");

class Cookie
{
    private $email;

    private $password;

    private $userType;

    public function __construct($email, $password, $userType)
    {
        $this->email = $email;
        $this->password = $password;
        $this->userType = $userType;
    }

    public function get($attribute)
    {
        return $this->$attribute;
    }

    public function saveToCookies($remember)
    {
        $cookieData = json_encode(get_object_vars($this));

        $key = get_cfg_var("encryption_key");

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encryptedData = openssl_encrypt($cookieData, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        $encodedData = base64_encode($iv . $encryptedData);

        setcookie("Login", $encodedData, ($remember == "on") ? 2147483647 : 0, "/");
    }
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