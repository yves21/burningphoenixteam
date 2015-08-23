<?php
header('Content-Type: application/json');
$url = "http://burningphoenixteam.vraiforum.com/rss.php";
$xml = simplexml_load_file($url) or die("feed not loading");
$numItems = count($xml->channel->item);
$i = 0;
echo "[";
foreach ($xml->channel->item as $item) {
    $pubDate = $item->pubDate;
    $format = "D, d M Y H:i:s P";
    $date = DateTime::createFromFormat($format,$pubDate);
    echo '{"title":"'.$item->title.'", "date":"'.$date->format('Y-m-d H:i:s').'","link":"'.$item->link.'","author":"'.$item->author.'"}';
    if(++$i !== $numItems) {
        echo ",";
    }
}
echo "]";
?>
