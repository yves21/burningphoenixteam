<?php

include(BASE."lib/PHPAuth/languages/fr.php");
include(BASE."lib/PHPAuth/config.class.php");
include(BASE."lib/PHPAuth/auth.class.php");

$dbauth = new PDO("mysql:host=localhost;dbname=bptauth", "root", "");

$config = new Config($dbauth);
$auth = new Auth($dbauth, $config, $lang);

?>
