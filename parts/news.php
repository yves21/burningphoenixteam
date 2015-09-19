<?php
if (isset($_GET['newsid'])) {

    echo "<div class=\"panel panel-primary\">";
        $newsfullscreen = $bptDao->getNewsById($_GET['newsid']);
        $newsauthor = $bptDao->getProfileById($newsfullscreen['author']);
        echo "<div class=\"panel-heading\">";
            echo "<h1>".$newsfullscreen['subject']."</h1>";
        echo "</div>";
        echo "<div class=\"panel-body\">";
            echo "<h2>".$newsfullscreen['summary']."</h2>";
            echo "<div>";
                echo html_entity_decode($newsfullscreen['content']);
                echo "<p>Auteur : ".$newsauthor['username']."</p>";
            echo "</div>";
        echo "</div>";
    echo "</div>";

} else {
    echo "<div class=\"newscaroussel\">";
    $newslist =  $bptDao->getAllNews(5);
    foreach  ($newslist as $newscaroussel) {
        echo "<div style=\"background-image:url('".BASE."upload/".$newscaroussel['image']."')\" id=\"".$newscaroussel['id']."\">";
        echo "<h1>".$newscaroussel['subject']."</h1><h2>".$newscaroussel['summary']."</h2>";
        echo "</div>";
    }
    echo "</div>";
}
?>
