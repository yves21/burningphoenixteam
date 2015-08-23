<?php
header('Content-Type: application/json');
$url = "https://www.googleapis.com/calendar/v3/calendars/bpt.burningphoenixteam@gmail.com/events?maxResults=15&key=AIzaSyBDIor8rccGDkDD4oHmBFlmZnVv-rO3Y-k";
$json = file_get_contents($url, 0, null, null);
$json_data = json_decode($json);
$numItems = count($json_data->items);
$i = 0;
echo "[";
foreach ( $json_data->items as $item ) {
    $startdate = $item->start->dateTime;
    $summary = $item->summary;
    $desc = "N/A";
    if (property_exists($item, 'description')) {
        $desc = $item->description;
    }
    $format = "Y-m-d\TH:i:sP";
    $date = DateTime::createFromFormat($format,$startdate);
    echo '{"date": "'.$date->format('Y-m-d H:i:s').'", "type": "meeting", "title": "'.$summary.'", "description": "'.$desc.'" }';
    if(++$i !== $numItems) {
        echo ",";
    }
}
echo "]";
?>