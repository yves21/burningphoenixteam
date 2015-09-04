<?php define('BASE','./');
require(BASE."conf/auth-config.php");
?>
<!doctype html>
<html>
    <head>
		<title>
			burningphoenixteam.fr
		</title>

		<?php include (BASE."parts/meta-css.php"); ?>
        <!--<link rel="stylesheet" href="<?= BASE ?>css/charte.css" >-->
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include (BASE."parts/header.php"); ?>

            <div>

               <h1>Présentation</h1>
               <h2>Test auto deploy</h2>

            </div>
			 <?php include (BASE."parts/footer.php"); ?>
		</div>
        <?php include (BASE."parts/js-script.php"); ?>
	</body>

</html>
