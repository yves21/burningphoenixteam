<?php

echo "<ul class=\"newslist\">";
$allnews = $bptDao->getAllNews(10);
foreach  ($allnews as $newsitem) {
    echo "<li>";
    echo "<div class=\"newspicture\">";
    echo "<a href=\"index.php?newsid=".$newsitem['id']."\"><img src=\"".BASE."upload/mini_".$newsitem['image']."\" /></a>";
    echo "</div>";
    echo "<div class=\"newsdetail\">";
    echo "<h1>".$newsitem['subject']."</h1><h2>".$newsitem['summary']."</h2>";
    echo $newsitem['created'];
    echo "</div>";
    echo "</li>";
}
echo "</ul>";

?>
