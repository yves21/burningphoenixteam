<?php define('BASE','../');

require(BASE."conf/auth-config.php");

if (isset($_POST['bt_submit'])) {

    $register = $auth->register($_POST['email'], $_POST['password1'], $_POST['password2']);

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
                 <?php if (!isset($_POST['bt_submit']) || (isset($_POST['bt_submit']) && $register['error'])) { ?>
                 <form action="register.php" method="post" class="form-horizontal" name="register" id="register">
                    <fieldset id="fs_general">
                        <legend>Enregistrement</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="email">Email : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" id="email" maxlength="120" placeholder="Votre email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="nickname">Nickname : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nickname" id="nickname" maxlength="120" placeholder="Nickname" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="password1">Mot de passe : </label>
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
                                <input type="reset" class="btn btn-warning" id="bt_reset" name="bt_reset" value="Reset" />
                                <input type="submit" class="btn btn-primary" id="bt_submit" name="bt_submit" value="Send" />
                            </div>
                        </div>
                    </fieldset>
                </form>
                 <?php }

                    if (isset($_POST['bt_submit'])) {
                        if($register['error']) {
                            // Something went wrong, display error message
                            echo '<div class="error">' . $register['message'] . '</div>';
                        } else {
                            // Logged in successfully, display success message
                            echo '<div class="success">' . $register['message'] . '</div>';
                        }
                    }
                 ?>
            </div>
			 <?php include (BASE."parts/footer.php"); ?>
		</div>
        <?php include (BASE."parts/js-script.php"); ?>
	</body>

</html>
