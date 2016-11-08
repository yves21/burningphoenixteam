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

            <div class="text-block">

                <h1>Recrutement</h1>

                <h2>Développement des sections suivantes (il n'y a pas que Star Citizen), contactez-nous sur le forum et sur le TS pour plus d'informations :</h2>

                <ul>
                    <li><strong>Elite Dangerous :</strong> <a href='http://burningphoenixteam.vraiforum.com/f257-Elite-Dangerous.htm'>http://burningphoenixteam.vraiforum.com/f257-Elite-Dangerous.htm</a></li>
                    <li><strong>Eve Online :</strong> <a href='http://burningphoenixteam.vraiforum.com/f260-EVE.htm'>http://burningphoenixteam.vraiforum.com/f260-EVE.htm</a></li>
                    <li><strong>Battlefield 1 :</strong> <a href='http://burningphoenixteam.vraiforum.com/f324-Battlefield-1.htm'>http://burningphoenixteam.vraiforum.com/f324-Battlefield-1.htm</a></li>
                    <li><strong>GTA V</strong></li>
                    <li><strong>Star Citizen :</strong> <a href='http://burningphoenixteam.vraiforum.com/f193-Star-Citizen.htm'>http://burningphoenixteam.vraiforum.com/f193-Star-Citizen.htm</a></li>
                </ul>
            </div>
			 <?php include (BASE."parts/footer.php"); ?>
		</div>
        <?php include (BASE."parts/js-script.php"); ?>
	</body>

</html>
