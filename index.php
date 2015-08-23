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
                        <div class="panel-heading">Présentation de la Team</div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, ex nibh antiopam suavitate mea. Et melius tritani scribentur mei, qui an volumus noluisse persequeris. Quis inermis inimicus ea nam. At sale deleniti principes per, ut periculis similique consetetur cum.
                            </p>
                            <p>
                                Ad vel prima illud inani, fabellas recusabo has ut. Per virtute posidonium ea. In fugit offendit quo, electram periculis ad mei, nec te saperet corpora. Id melius inciderint vix. An mel aeque graece, pri et oratio facilisis, nam ut amet phaedrum adipiscing. Meliore oportere cum ne, reque simul quo in.
                            </p>
                            <p>
                                Vis at verear bonorum prodesset. Assentior maiestatis ius eu. Id per aperiri iracundia vituperata, duo ex doctus explicari persecuti. Duo modus dicunt nostrum te.
                            </p>
                            <p>
                                Simul integre ea vel. Cibo nostrud mei ad, reque saperet scriptorem cu per. Te congue admodum vel, munere reformidans ei sed. Ius nulla quaeque fabellas ut. Debitis molestiae conceptam mel ne, vim et oblique accusam vivendum. Nibh alienum deseruisse ne has, nec quot omnis liber at, sit quodsi integre maiorum an.
                            </p>
                            <p>
                                Ut est laudem possit, dicam graece convenire mea cu. Ei usu deleniti eleifend, stet inani qui no. Elitr aliquando adolescens id nec, ex congue doming eum. Deleniti officiis cu eum, duo et numquam legendos laboramus, mei commune sententiae at. Natum minim possim ea nec, sit ea malorum antiopam dignissim, te illud albucius est. Nobis dolore appareat an cum.
                            </p>
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
	</body>

</html>
