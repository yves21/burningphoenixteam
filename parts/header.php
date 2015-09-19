<?php $pagename = basename($_SERVER['PHP_SELF']); ?>
<header>
    <a href="<?= BASE ?>index.php">
        <img src="<?= BASE ?>image/banniere.jpg" class="img-responsive" alt="Banniere BPT" />
    </a>
</header>
<nav>
    <div id="container-nav">
    <ul class="nav nav-pills ul-nav">
        <li <?php if ($pagename=='index.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>index.php">Actualités</a></li>
        <li <?php if ($pagename=='presentation.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>presentation.php">Présentation</a></li>
        <li <?php if ($pagename=='historique.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>historique.php">Historique</a></li>
        <li <?php if ($pagename=='recrut.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>recrut.php">Recrutement</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Jeux<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php
                    $games = $bptDao->getGames();
                    foreach($games as $game) {
                        echo "<li><a href=\"".BASE."game.php?game=".$game['id']."\">".$game['name']."</a></li>";
                    }
                ?>
            </ul>
        </li>
        <li <?php if ($pagename=='charte.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>charte.php">Charte</a></li>
        <li><a href="http://forum.burningphoenixteam.fr/">Forum</a></li>
        <li <?php if ($pagename=='admin.php') { echo "class=\"active\""; } ?>><a href="<?= BASE ?>admin/admin.php">Administration</a></li>
        <?php if(isset($user)) { ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= $user['email'] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= BASE ?>auth/logout.php">Logout</a></li>
                </ul>
            </li>
        <?php } ?>
    </ul>
    </div>
</nav>
