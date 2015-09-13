<?php define('BASE','../');

require(BASE."conf/auth-config.php");

securedAccess($userid, $bptDao, 'usermanager');

if (isset($_POST['bt_submit'])) {
    if( is_array($_POST['userrole']) ) {
        foreach($_POST['userrole'] as $userrole) {
            $roletokens = explode("/", $userrole);
            if ($roletokens[2] == 'unchecked') {
                $bptDao->removeRole(intval($roletokens[0]),$roletokens[1]);
            } else if ($roletokens[2] == 'checked') {
                $bptDao->addRole(intval($roletokens[0]),$roletokens[1]);
            }
        }
    } else {
        echo $_POST['userrole'];
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

            <div class="management-content">
                <h1>User management</h1>
                <form action="usermanagement.php" method="post" name="usermgmt" id="usermgmt">
                    <ul>
                        <?php
                            $roles = $bptDao->getRoles();
                            $users = $bptDao->getValidatedUsers($config);
                            foreach ($users as $user) {
                                $userProfile = $bptDao->getProfileById($user['id']);
                                echo "<li>";
                                echo "<h2>".$userProfile['username']."</h2>";
                                foreach ($roles as $role) {
                                    $checked = "";
                                    if ($bptDao->hasRole($user['id'], $role['role'])) {
                                        $checked="checked";
                                    }
                                    echo "<input type='checkbox' name='roles' value='".$user['id']."/".$role['role']."' ".$checked."/> ".$role['role'];
                                    echo "<input type='hidden' name='userrole[]' value='' /><br />";
                                }
                                echo "</li>";
                            }
                        ?>
                    </ul>
                    <fieldset id="fs_buttons">
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div>
                                <input type="reset" class="btn btn-warning" id="bt_reset" name="bt_reset" value="Reset" />
                                <input type="submit" class="btn btn-primary" id="bt_submit" name="bt_submit" value="Send" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
			 <?php include ("../parts/footer.php"); ?>
		</div>
        <?php include ("../parts/js-script.php"); ?>
        <script type="text/javascript" src="<?= BASE ?>js/usermgmt.js" ></script>
	</body>

</html>
