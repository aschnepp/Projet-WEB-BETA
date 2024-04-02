<?php
require("{$_SERVER["DOCUMENT_ROOT"]}/controller/cookies.php");

$Cookie = new Cookie();
var_dump($Cookie);

$Cookie = $Cookie->decodeCookieData();
var_dump($Cookie);