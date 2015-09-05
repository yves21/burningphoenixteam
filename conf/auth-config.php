<?php

require(BASE."lib/PHPAuth/languages/fr_FR.php");
require(BASE."lib/PHPAuth/config.class.php");
require(BASE."lib/PHPAuth/auth.class.php");
require(BASE."conf/BptDao.class.php");

$dbauth = new PDO("mysql:host=localhost;dbname=bpt", "root", "UeyK7b45");
$dbauth->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$config = new Config($dbauth);
$auth = new Auth($dbauth, $config, $lang);

$bptDao = new BptDao($dbauth);

if(isset($_COOKIE[$config->cookie_name]) && $auth->checkSession($_COOKIE[$config->cookie_name])) {
    $userid = $auth->getSessionUID($_COOKIE[$config->cookie_name]);
    $user = $auth->getUser($userid);
}

function securedAccess($userid, $bptDao, $role) {
    if(!isset($userid)) {
        $nexturl = urlencode($_SERVER['REQUEST_URI']);
        header('Location: '.BASE.'auth/login.php?nexturl='.$nexturl, TRUE, 302);
        exit();
    } else if ($role != "") {
        if (!$bptDao->hasRole($userid, $role)) {
            header('HTTP/1.0 403 Forbidden');
            echo 'You don\'t have enough permissions to access this page !';
            exit();
        }
    }
}
?>
