<?php define('BASE','./'); ?>
<!doctype html>
<html>
	<!--[if lt IE 9]>
　　　　<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <head>
		<title>
			burningphoenixteam.fr
        </title>

		<?php require "parts/meta-css.php"; ?>
        <link rel="stylesheet" href="lib/jQueryEventCalendar/css/eventCalendar.css">
        <link rel="stylesheet" href="lib/jQueryEventCalendar/css/eventCalendar_theme_responsive.css">
        <link rel="stylesheet" type="text/css" href="lib/slick.js/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="lib/slick.js/slick/slick-theme.css"/>
	</head>
	<body>
		<div id="container" class="container-fluid">

            <?php require "parts/header.php"; ?>

			<section id="news">
			</section>

            <div>

                <?php require "parts/leftaside.php"; ?>

               <section id="content" class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Actualités</div>
                        <div class="panel-body newspanel">
                           <?php require "parts/news.php"; ?>
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
