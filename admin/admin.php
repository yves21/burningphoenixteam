<?php define('BASE','../');

require(BASE."conf/auth-config.php");

securedAccess($userid, $bptDao, '');

?>

<!doctype html>
<html>
    <head>
		<title>
			burningphoenixteam.fr
		</title>

		<?php include ("../parts/meta-css.php"); ?>
        <link rel="stylesheet" href="<?= BASE ?>css/admin.css" >
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include ("../parts/header.php"); ?>

            <div class="management-content">
                <h1>Administration</h1>
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
