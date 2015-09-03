<?php

echo "<div>"
echo "</div>"

echo "<ul class=\"newslist\">";
$allnews = $bptDao->getAllNews(5);
foreach  ($allnews as $newsitem) {
    echo "<li>";

    echo "<div class=\"newspicture\">";
    echo "<a href=\"index.php?newsid=".$newsitem['id']."\"><img src=\"".BASE."upload/mini_".$newsitem['image']."\" /></a>";
    echo "</div>";

    echo "<div class=\"newsdetail\">";
    echo "<h1>".$newsitem['subject']."</h1>";
    echo "<h2>".$newsitem['summary']."</h2>";
    echo "<p>".$newsitem['created']."</p>";
    echo "</div>";

    echo "</li>";
}
echo "</ul>";

?>
