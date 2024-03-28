<?php
require("{$_SERVER["DOCUMENT_ROOT"]}/assets/back/controller/cookies.php");
function decodeCookieData($encodedData)
{
    $key = get_cfg_var("encryption_key");
    $decodedData = base64_decode($encodedData);
    $ivLength = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($decodedData, 0, $ivLength);
    $encryptedData = substr($decodedData, $ivLength);

    $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

    $cookieData = json_decode($decryptedData);

    $cookie = new Cookie($cookieData->email, $cookieData->password, $cookieData->userType);

    return $cookie;
}

if (isset($_COOKIE["Login"])) {
    $encodedCookieData = $_COOKIE["Login"];
    $cookie = decodeCookieData($encodedCookieData);
    var_dump($cookie);
} else {
    echo "Rien";
}
