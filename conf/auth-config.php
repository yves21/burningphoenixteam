<?php

include(BASE."lib/PHPAuth/languages/fr_FR.php");
include(BASE."lib/PHPAuth/config.class.php");
include(BASE."lib/PHPAuth/auth.class.php");

$dbauth = new PDO("mysql:host=localhost;dbname=bpt", "root", "");
$dbauth->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$config = new Config($dbauth);
$auth = new Auth($dbauth, $config, $lang);

if(isset($_COOKIE[$config->cookie_name]) && $auth->checkSession($_COOKIE[$config->cookie_name])) {
    $userid = $auth->getSessionUID($_COOKIE[$config->cookie_name]);
    $user = $auth->getUser($userid);
}
?>
