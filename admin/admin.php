<?php define('BASE','../');

require(BASE."conf/auth-config.php");

if(!isset($user)) {
    $nexturl = urlencode($_SERVER['REQUEST_URI']);
    header('Location: '.BASE.'auth/login.php?nexturl='.$nexturl, TRUE, 302);
    exit();
}
?>

<!doctype html>
<html>
    <head>
		<title>
			burningphoenixteam.fr
		</title>

		<?php include ("../parts/meta-css.php"); ?>
        <!--<link rel="stylesheet" href="<?= BASE ?>css/admin.css" >-->
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include ("../parts/header.php"); ?>

            <div>
                <ul>
                    <li><a href="<?= BASE ?>admin/newsmanagement.php">Gestion des news</a></li>
                    <li><a href="<?= BASE ?>admin/usermanagement.php">User administration</a></li>
                    <li><a href="<?= BASE ?>admin/gamemanagement.php">Gestion des jeux</a></li>
                </ul>

            </div>
			 <?php include ("../parts/footer.php"); ?>
		</div>
        <?php include ("../parts/js-script.php"); ?>
	</body>

</html>
