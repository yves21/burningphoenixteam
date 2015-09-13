<?php

echo "<ul class=\"newslist\">";
$allnews = $bptDao->getAllNews(5);
foreach  ($allnews as $newsitem) {
    $newsauthor = $bptDao->getProfileById($newsitem['author']);
    echo "<li>";

    echo "<div class=\"newspicture\">";
    echo "<a href=\"index.php?newsid=".$newsitem['id']."\"><img src=\"".BASE."upload/mini_".$newsitem['image']."\" /></a>";
    echo "</div>";

    echo "<div class=\"newsdetail\">";
    echo "<h1>".$newsitem['subject']."</h1>";
    echo "<h2>".$newsitem['summary']."</h2>";
    echo "</div>";
    echo "<p>".$newsitem['created']."<br/>".$newsauthor['username']."</p>";

    echo "</li>";
}
echo "</ul>";

?>
