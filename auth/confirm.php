<?php define('BASE','../');

require(BASE."conf/auth-config.php");

$confirm = $auth->activate($_GET['key']);

if($confirm['error']) {
    // Something went wrong, display error message
    echo '<div class="error">' . $confirm['message'] . '</div>';
} else {
    echo '<div class="success">' . $confirm['message'] . '</div>';
}
exit();

?>
