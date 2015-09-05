<?php define('BASE','./');
require(BASE."conf/auth-config.php");


if (isset($_GET['game'])) {
    $gameid = $_GET['game'];
    $viewgame = $bptDao->getGame($gameid);
    $gameauthor = $bptDao->getProfileById($viewgame['author']);
}
?>
<!doctype html>
<html>
    <head>
		<title>
			burningphoenixteam.fr
		</title>

		<?php include (BASE."parts/meta-css.php"); ?>
        <link rel="stylesheet" href="<?= BASE ?>css/game.css" >
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include (BASE."parts/header.php"); ?>

            <div class="text-block">
                <h1><?= $viewgame['name'] ?></h1>
                <div>
                    <?= html_entity_decode($viewgame['content']) ?>
                    <p>Auteur : <?= $gameauthor['username'] ?>
                    </p>
                </div>
            </div>
			 <?php include (BASE."parts/footer.php"); ?>
		</div>
        <?php include (BASE."parts/js-script.php"); ?>
	</body>

</html>
