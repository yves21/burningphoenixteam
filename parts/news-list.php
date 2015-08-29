<?php

echo "<ul class=\"newslist\">";
$sql =  'SELECT id, subject, summary, image, created FROM news ORDER BY created desc';
foreach  ($bdd->query($sql) as $row) {
    echo "<li>";
    echo "<div class=\"newspicture\">";
    echo "<a href=\"index.php?newsid=".$row['id']."\"><img src=\"".BASE."upload/mini_".$row['image']."\" /></a>";
    echo "</div>";
    echo "<div class=\"newsdetail\">";
    echo "<h1>".$row['subject']."</h1><h2>".$row['summary']."</h2>";
    echo $row['created'];
    echo "</div>";
    echo "</li>";
}
echo "</ul>";

?>
