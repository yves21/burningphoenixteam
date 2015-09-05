<?php define('BASE','../');

require(BASE."conf/auth-config.php");

$auth->logout($_COOKIE[$config->cookie_name]);

header('Location: '.BASE.'index.php', TRUE, 302);
exit();

?>
