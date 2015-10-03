<?php


$allNews = $bptDao->getAllNews(10);
$totalNews = count($allNews);
if ($totalNews > 5) {
    $firstNews = array_slice($allNews, 0, 5);
    $oldNews = array_slice($allNews, 5, $totalNews - 5);
} else {
    $firstNews = array_slice($allNews, 0, $totalNews);
}
echo "<ul class=\"newslist\">";
foreach  ($firstNews as $newsitem) {
    $newsauthor = $bptDao->getProfileById($newsitem['author']);
    echo "<li id=\"".$newsitem['id']."\">";
    echo "<div class=\"newspicture\">";
    echo "<img src=\"".BASE."upload/mini_".$newsitem['image']."\" />";
    echo "</div>";
    echo "<div class=\"newsdetail\">";
    echo "<h1>".$newsitem['subject']."</h1>";
    echo "<h2>".$newsitem['summary']."</h2>";
    echo "</div>";
    echo "<p>".$newsitem['created']."<br/>".$newsauthor['username']."</p>";
    echo "</li>";
}
echo "</ul>";

if ($oldNews) {
    echo "<p class=\"morenews\"><span>Actualités plus anciennes</span></p>";
    echo "<ul class=\"newslistmore\">";
    foreach  ($oldNews as $newsitem) {
        $newsauthor = $bptDao->getProfileById($newsitem['author']);
        echo "<li id=\"".$newsitem['id']."\">";
        echo "<div class=\"newsdetail\">";
        echo "<h1>".$newsitem['subject']."</h1>";
        echo "<h2>".$newsitem['summary']."</h2>";
        echo "</div>";
        echo "<p>".$newsitem['created']."<br/>".$newsauthor['username']."</p>";
        echo "</li>";
    }
    echo "</ul>";
}

?>
