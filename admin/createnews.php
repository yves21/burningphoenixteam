<?php define('BASE','../'); ?>
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

	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php include ("../parts/header.php"); ?>

            <div>

               <form action="createnews.php" method="post" name="createnews" id="createnews" enctype="multipart/form-data">
                    <fieldset id="fs_general">
                        <legend>Créer une news</legend>
                        <label for="subject">Sujet : </label>
                        <input type="text" name="subject" id="subject" maxlength="120" />
                        <label for="summary">Résumé : </label>
                        <input type="text" name="summary" id="summary" maxlength="255" />
                        <label for="content">Contenu :</label>
                        <textarea name="content" id="content"></textarea>
                        <label for="image">Image : </label>
                        <input type="file" name="image" id="image" accept="image/*" />
                        <label for="created">Date : </label>
                        <input type="datetime" name="created" id="created" />
                    </fieldset>
                    <fieldset id="fs_buttons">
                        <input type="reset" id="bt_reset" name="bt_reset" value="Reset" />
                        <input type="submit" id="bt_submit" name="bt_submit" value="Send" />
                    </fieldset>
                </form>

            </div>
			 <?php include ("../parts/footer.php"); ?>
		</div>
        <?php include ("../parts/js-script.php"); ?>
	</body>

</html>
