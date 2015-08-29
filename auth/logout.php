<?php define('BASE','../');

require(BASE."conf/auth-config.php");

$auth->logout($_COOKIE[$config->cookie_name]);

header('Location: http://localhost/burningphoenixteam/', TRUE, 302);
exit();

?>
