<?php
if (isset($_GET['newsid'])) {
    echo "<div class=\"newscontent\">";
    $newsfullscreen = $bptDao->getNewsById($_GET['newsid']);
    echo html_entity_decode($newsfullscreen['content']);
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
