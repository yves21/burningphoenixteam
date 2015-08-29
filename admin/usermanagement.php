<?php define('BASE','../');

require(BASE."conf/auth-config.php");
require(BASE."conf/BptAuthDao.class.php");

if(!isset($user)) {
    header('Location: '.BASE.'auth/login.php', TRUE, 302);
    exit();
} else {
    $bptAuthDao = new BptAuthDao($dbauth);
    if (!$bptAuthDao->hasRole($userid, 'usermanager')) {
        header('HTTP/1.0 403 Forbidden');
        echo 'You don\'t have enough permissions to access this page !';
        exit();
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
        <link rel="stylesheet" href="<?= BASE ?>css/admin.css" >
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include ("../parts/header.php"); ?>

            <div>
                <h1>User management</h1>
                <ul>
                    <?php
                        $users = $bptAuthDao->getValidatedUsers($config);
                        foreach ($users as $user) {
                            echo "<li>".$user['email']."</li>";
                        }
                    ?>
                </ul>
            </div>
			 <?php include ("../parts/footer.php"); ?>
		</div>
        <?php include ("../parts/js-script.php"); ?>
	</body>

</html>
