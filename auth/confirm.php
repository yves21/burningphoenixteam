<?php define('BASE','../');

require(BASE."conf/auth-config.php");

$confirm = $auth->activate($_GET['key']);

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

               <?php
                    if($confirm['error']) {
                        // Something went wrong, display error message
                        echo '<div class="error">' . $confirm['message'] . '</div>';
                    } else {
                        echo '<div class="success">' . $confirm['message'] . '</div>';
                    }
                ?>
            </div>
			 <?php include (BASE."parts/footer.php"); ?>
		</div>
        <?php include (BASE."parts/js-script.php"); ?>
	</body>

</html>
