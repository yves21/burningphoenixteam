<?php define('BASE','../');

require (BASE.'conf/utils.php');

if (isset($_POST['bt_submit'])) {
    try {
        $bdd = new PDO ('mysql:host=localhost;dbname=bpt', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $prefixImageName = generateRandomString();

    // Where the file is going to be placed
    $target_path = "../upload/";

    $imageName = $prefixImageName.basename($_FILES['image']['name']);

    $target_path = $target_path.$imageName;

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        echo "The file ".  basename( $_FILES['image']['name']).
        " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }

    $stmt = $bdd->prepare('INSERT INTO news(subject, summary, content, image, created) VALUES (:subject, :summary, :content, :image, :created)');
    $stmt->bindParam(':subject', $_POST['subject']);
    $stmt->bindParam(':summary', $_POST['summary']);
    $stmt->bindParam(':content', htmlspecialchars($_POST['content']));
    $stmt->bindParam(':image',  $imageName);
    $stmt->bindParam(':created', $_POST['created']);
    $stmt->execute();
}
?>

<!doctype html>
<html>
	<!--[if lt IE 9]>
　　　　<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

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

               <form action="createnews.php" method="post" class="form-horizontal" name="createnews" id="createnews" enctype="multipart/form-data">
                    <fieldset id="fs_general">
                        <legend>Créer une news</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="subject">Sujet : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subject" id="subject" maxlength="120" placeholder="Sujet de la news" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="summary">Résumé : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="summary" id="summary" maxlength="255" placeholder="Résumé de la news" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="content">Contenu :</label>
                            <div class="col-sm-10">
                                <textarea name="content" id="content" placeholder="Tapez ici votre contenu"></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'content' );
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="image">Image : </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="image" accept="image/*" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="created">Date : </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="created" id="created" placeholder="24-08-2015" />
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="fs_buttons">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
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
	</body>

</html>
