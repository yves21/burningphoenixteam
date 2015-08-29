<?php define('BASE','./');
require(BASE."conf/db-config.php");
?>
<!doctype html>
<html>

    <head>
		<title>
			burningphoenixteam.fr
        </title>

		<?php require "parts/meta-css.php"; ?>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="lib/jQueryEventCalendar/css/eventCalendar.css">
        <link rel="stylesheet" href="lib/jQueryEventCalendar/css/eventCalendar_theme_responsive.css">
        <link rel="stylesheet" type="text/css" href="lib/slick.js/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="lib/slick.js/slick/slick-theme.css"/>
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php require "parts/header.php"; ?>

            <div class="row">

                <?php require "parts/leftaside.php"; ?>

               <section id="content" class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-body newspanel">
                           <?php require "parts/news.php"; ?>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-body bptvideo">
                          <div style='position: relative; width: 100%; height: 0px; padding-bottom: 60%;'>
                            <iframe style='position: absolute; left: 0px; top: 0px; width: 100%; height: 100%'  src="https://www.youtube.com/embed/zYMwwVrh0sI" frameborder="0" allowfullscreen></iframe>
                          </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Actualités</div>
                        <div class="panel-body">
                           <?php require "parts/news-list.php"; ?>
                        </div>
                    </div>
                </section>

                <?php require "parts/rightaside.php"; ?>

            </div>
			 <?php require "parts/footer.php"; ?>
		</div>
        <?php include "parts/js-script.php"; ?>
        <script type="text/javascript" src="js/index.js" ></script>
        <script type="text/javascript" src="lib/jQueryEventCalendar/js/moment.js" ></script>
        <script type="text/javascript" src="lib/jQueryEventCalendar/js/jquery.eventCalendar.min.js" ></script>
        <script type="text/javascript" src="lib/slick.js/slick/slick.min.js"></script>
	</body>

</html>
