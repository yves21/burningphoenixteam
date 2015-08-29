<?php $pagename = basename($_SERVER['PHP_SELF']); ?>
<header>
    <img src="<?= BASE ?>image/banniere.jpg" width="1200" alt="Banner" />
</header>
<nav>
    <ul class="nav nav-pills">
        <li <?php if ($pagename=='index.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>index.php">Actualités</a></li>
        <li <?php if ($pagename=='presentation.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>presentation.php">Présentation</a></li>
        <li <?php if ($pagename=='historique.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>historique.php">Historique</a></li>
        <li <?php if ($pagename=='recrut.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>recrut.php">Recrutement</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Jeux<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">Star Citizen</a></li>
                <li><a href="#">Arma 3</a></li>
                <li><a href="#">World of tank</a></li>
                <li><a href="#">Ark</a></li>
                <li><a href="#">Project Zomboid</a></li>
                <li><a href="#">Company of Heroes 2</a></li>
                <li><a href="#">Wargame Red Dragon</a></li>
                <li><a href="#">Supreme commander</a></li>
                <li><a href="#">Autres</a></li>
            </ul>
        </li>
        <li <?php if ($pagename=='charte.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>charte.php">Charte</a></li>
        <li><a href="http://forum.burningphoenixteam.fr/">Forum</a></li>
    </ul>
</nav>
