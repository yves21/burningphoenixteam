<?php define('BASE','../');

require(BASE."conf/auth-config.php");

securedAccess($userid, $bptDao, 'gamemanager');

$mode = 'normal';
$gameid=0;

if (isset($_GET['edit'])) {
    $mode='edit';
    $gameid = $_GET['edit'];
    $editedgame = $bptDao->getGame($gameid);

    if ($editedgame == null) {
        header('HTTP/1.0 500 Internal Server Error', true, 500);
        echo 'Wrong parameters !';
        exit();
    }
} else if (isset($_GET['new'])) {
    $mode='create';
} else if (isset($_GET['del'])) {
    $gameid = $_GET['del'];
    $bptDao->deleteGame($gameid);
}


if (isset($_POST['bt_submit'])) {
   if ($_POST['gameid'] == "0") {
       $bptDao->createGame($_POST['name'], $_POST['content'], $userid);
   } else {
       $bptDao->updateGame($_POST['gameid'], $_POST['content'], $userid);
   }
}
?>

<!doctype html>
<html>
    <head>
		<title>
			burningphoenixteam.fr
		</title>

		<?php include ("../parts/meta-css.php"); ?>
        <link rel="stylesheet" href="<?= BASE ?>lib/jquery-ui/themes/smoothness/jquery-ui.min.css" >
        <link rel="stylesheet" href="<?= BASE ?>css/admin.css" >
        <script src="<?= BASE ?>lib/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include ("../parts/header.php"); ?>

            <div class="management-content">
                <h1>Game management</h1>

                <ul>
                    <?php
                        $games = $bptDao->getGames();
                        foreach ($games as $game) {
                            echo "<li><a href='gamemanagement.php?edit=".$game['id']."'>".$game['name']."</a>"
                                ." <span class='glyphicon glyphicon-trash delete-game' id='".$game['id']."'></span></li>";
                        }
                    ?>
                </ul>
                 <span class="glyphicon glyphicon-plus-sign"></span> <a href="gamemanagement.php?new=0">Créer un nouveau jeu</a>

                <?php if ($mode == 'edit' || $mode == 'create') { ?>
                <form action="gamemanagement.php" method="post" name="gamemgmt" id="gamemgmt">
                    <fieldset id="fs_game">
                        <legend><?php if ($mode == 'edit') { echo $editedgame['name']; } else { echo "Nouveau jeu"; } ?></legend>
                        <?php if ($mode == 'create') { ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Nom : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" maxlength="120" placeholder="Nom du jeu" />
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="content">Contenu :</label>
                            <div class="col-sm-10">
                                <textarea name="content" id="content" placeholder="Tapez ici votre contenu"><?php if ($mode == 'edit') { echo html_entity_decode($editedgame['content']); } ?></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'content' );
                                </script>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="fs_buttons">
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div>
                                <input type="hidden" name="gameid" id="gameid" value="<?= $gameid ?>" />
                                <input type="reset" class="btn btn-warning" id="bt_reset" name="bt_reset" value="Reset" />
                                <input type="submit" class="btn btn-primary" id="bt_submit" name="bt_submit" value="Send" />
                            </div>
                        </div>
                    </fieldset>
                </form>
                <?php } ?>
            </div>
			 <?php include ("../parts/footer.php"); ?>
		</div>
        <div id="dialog-confirm" title="Sure to delete this game ?">
          <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This game will be permanently deleted and cannot be recovered. Are you sure?</p>
        </div>
        <?php include ("../parts/js-script.php"); ?>
        <script type="text/javascript" src="<?= BASE ?>lib/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= BASE ?>js/management.js"></script>
	</body>

</html>
