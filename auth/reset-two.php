<?php define('BASE','../');

require(BASE."conf/fn-utils.php");
require(BASE."conf/auth-config.php");

if (isset($_GET['key'])) {
    $key = $_GET['key'];
} else if (isset($_POST['bt_submit'])) {
    $reset = $auth->resetPass($_POST['key'], $_POST['password1'], $_POST['password2']);
}
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

                <?php if (!isset($_POST['bt_submit']) || (isset($_POST['bt_submit']) && $reset['error'])) { ?>
                 <form action="reset-two.php" method="post" class="form-horizontal" name="reset-two" id="reset-two">
                    <fieldset id="fs_general">
                        <legend>Réinitialisation de votre mot de passe</legend>
                         <div class="form-group">
                            <label class="col-sm-2 control-label" for="password1">Nouveau mot de passe : </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password1" id="password1" maxlength="30" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="password2">Confirmation mot de passe : </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password2" id="password2" maxlength="30" />
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="fs_buttons">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" id="key" name="key" value="<?= $key ?>" />
                                <input type="reset" class="btn btn-warning" id="bt_reset" name="bt_reset" value="Reset" />
                                <input type="submit" class="btn btn-primary" id="bt_submit" name="bt_submit" value="Send" />
                            </div>
                        </div>
                    </fieldset>
                </form>
                <?php }

                    if (isset($_POST['bt_submit'])) {
                        if($reset['error']) {
                            // Something went wrong, display error message
                            echo '<div class="error">' . $reset['message'] . '</div>';
                        } else {
                            echo '<div class="success">' . $reset['message'] . '</div>';
                        }
                    }
                ?>
            </div>
			 <?php include (BASE."parts/footer.php"); ?>
		</div>
        <?php include (BASE."parts/js-script.php"); ?>
	</body>

</html>
