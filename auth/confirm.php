<?php define('BASE','../');

include(BASE."lib/PHPAuth/languages/fr.php");
include(BASE."lib/PHPAuth/config.class.php");
include(BASE."lib/PHPAuth/auth.class.php");


$dbauth = new PDO("mysql:host=localhost;dbname=bptauth", "root", "");

$config = new Config($dbauth);
$auth = new Auth($dbauth, $config, $lang);

$confirm = $auth->activate($_GET['key']);

if($confirm['error']) {
    // Something went wrong, display error message
    echo '<div class="error">' . $confirm['message'] . '</div>';
} else {
    echo '<div class="success">' . $confirm['message'] . '</div>';
}
exit();

?>
<!doctype html>
<html>
    <head>
		<title>
			burningphoenixteam.fr
		</title>

		<?php include (BASE."parts/meta-css.php"); ?>
        <link rel="stylesheet" href="<?= BASE ?>css/auth.css" >
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include (BASE."parts/header.php"); ?>

            <div>

            </div>
			 <?php include (BASE."parts/footer.php"); ?>
		</div>
        <?php include (BASE."parts/js-script.php"); ?>
	</body>

</html>
