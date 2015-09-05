<?php define('BASE','../');

require(BASE."conf/auth-config.php");
require(BASE."conf/fn-utils.php");

if(!isset($user)) {
    $nexturl = urlencode($_SERVER['REQUEST_URI']);
    header('Location: '.BASE.'auth/login.php?nexturl='.$nexturl, TRUE, 302);
    exit();
} else {

    if (!$bptDao->hasRole($userid, 'newsmanager')) {
        header('HTTP/1.0 403 Forbidden');
        echo 'You don\'t have enough permissions to access this page !';
        exit();
    }
}

$mode = 'normal';
$newsid=0;

if (isset($_GET['edit'])) {
    $mode='edit';
    $newsid = $_GET['edit'];
    $editednews = $bptDao->getNewsById($newsid);

    if ($editednews == null) {
        header('HTTP/1.0 500 Internal Server Error', true, 500);
        echo 'Wrong parameters !';
        exit();
    }

} else if (isset($_GET['new'])) {
    $mode='create';
}

if (isset($_POST['bt_submit'])) {
   if ($_POST['newsid'] == "0") {
        $prefixImageName = generateRandomString();
        $upload_path = "../upload/";
        $imageName = $prefixImageName.basename($_FILES['image']['name']);
        $target_path = $upload_path.$imageName;
        $target_path_mini = $upload_path."mini_".$imageName;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
           echo "The file ".  basename( $_FILES['image']['name'])." has been uploaded\n";
           $info = pathinfo($target_path);
           createThumbnail($info, $target_path, $target_path_mini, 200);
        } else{
            echo "There was an error uploading the file, please try again!";
        }
        $bptDao->insertNews($_POST['subject'], $_POST['summary'], $_POST['content'], $imageName, $userid);
   } else {
        $bptDao->updateNews($_POST['newsid'], $_POST['content']);
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
        <script src="<?= BASE ?>lib/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include ("../parts/header.php"); ?>

            <div>
                <h1>News management</h1>

                <ul>
                    <?php
                        $allnews = $bptDao->getAllNews(10);
                        foreach ($allnews as $newsitem) {
                            echo "<li><a href='newsmanagement.php?edit=".$newsitem['id']."'>".$newsitem['subject']."</a></li>";
                        }
                    ?>
                </ul>
                <a href="newsmanagement.php?new=0">Créer une nouvelle news</a>

                <?php if ($mode == 'edit' || $mode == 'create') { ?>

                <form action="newsmanagement.php" method="post" class="form-horizontal" name="newsmgmt" id="newsmgmt" enctype="multipart/form-data">
                    <fieldset id="fs_general">
                        <legend><?php if ($mode == 'edit') { echo $editednews['subject']; } else { echo "Créer une news"; } ?></legend>
                        <?php if ($mode == 'create') { ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="subject">Sujet : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subject" id="subject" maxlength="120" placeholder="Sujet de la news" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="summary">Résumé : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="summary" id="summary" maxlength="255" placeholder="Résumé de la news" required />
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="content">Contenu :</label>
                            <div class="col-sm-10">
                                <textarea name="content" id="content" placeholder="Tapez ici votre contenu" required ><?php if ($mode == 'edit') { echo html_entity_decode($editednews['content']); } ?></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'content', { language : 'fr' } );
                                </script>
                            </div>
                        </div>
                        <?php if ($mode == 'create') { ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="image">Image : </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="image" accept="image/*" required />
                            </div>
                        </div>
                        <?php } ?>
                    </fieldset>
                    <fieldset id="fs_buttons">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" name="newsid" id="newsid" value="<?= $newsid ?>" />
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
        <?php include ("../parts/js-script.php"); ?>
	</body>

</html>
