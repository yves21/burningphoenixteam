<?php define('BASE','../');

require(BASE."conf/fn-utils.php");
require(BASE."conf/auth-config.php");

if (isset($_POST['bt_submit'])) {

    if (isset($_POST['rememberme'])) {
        $rememberme = $_POST['rememberme'];
    } else {
        $rememberme = false;
    }

    $login = $auth->login($_POST['email'], $_POST['password'], $rememberme);

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

                <?php if (!isset($_POST['bt_submit']) || (isset($_POST['bt_submit']) && $login['error'])) { ?>
                 <form action="login.php" method="post" class="form-horizontal" name="login" id="login">
                    <fieldset id="fs_general">
                        <legend>Connexion</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="email">Email : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" id="email" maxlength="120" placeholder="Votre email" value="<?= getSafePostValue('email') ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="password">Mot de passe : </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password" maxlength="30" value="<?= getSafePostValue('password') ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="rememberme">Remember : </label>
                            <div class="col-sm-10">
                                <input type="checkbox" name="rememberme" id="rememberme" />
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
                        if($login['error']) {
                            // Something went wrong, display error message
                            echo '<div class="error">' . $login['message'] . '</div>';
                        } else {
                            // Logged in successfully, set cookie, display success message
                            setcookie($config->cookie_name, $login['hash'], $login['expire'], $config->cookie_path, $config->cookie_domain, $config->cookie_secure, $config->cookie_http);
                            echo '<div class="success">' . $login['message'] . '</div>';
                        }
                    }
                ?>
                <div class="info">Pas encore de compte ? <a href="<?= BASE ?>auth/register.php">cliquez ici</a> vous enregistrer.</div>
            </div>
			 <?php include (BASE."parts/footer.php"); ?>
		</div>
        <?php include (BASE."parts/js-script.php"); ?>
	</body>

</html>
