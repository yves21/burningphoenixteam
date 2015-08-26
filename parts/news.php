<?php

try {
    $bdd = new PDO ('mysql:host=localhost;dbname=bpt', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}
?>



<?php
if (isset($_GET['newsid'])) {
    echo "<div class=\"newscontent\">";
    $stmt = $bdd->prepare('SELECT content FROM news WHERE id=? ORDER BY created desc');
    if ($stmt->execute(array($_GET['newsid']))) {
        while ($row = $stmt->fetch()) {
            echo html_entity_decode($row['content']);
        }
    }
     echo "</div>";

} else {
    echo "<div class=\"newscaroussel\">";
    $sql =  'SELECT id, subject, summary, image, created FROM news ORDER BY created desc';
    foreach  ($bdd->query($sql) as $row) {
        echo "<div style=\"background-image:url('".BASE."upload/".$row['image']."')\" id=\"".$row['id']."\">";
        echo "<h1>".$row['subject']."</h1><h2>".$row['summary']."</h2>";
        echo "</div>";
    }
    echo "</div>";
}
?>
