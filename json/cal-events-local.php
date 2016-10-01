<?php define('BASE','../');
header('Content-Type: application/json');
require(BASE."conf/auth-config.php");
$events_data = $bptDao->getAllEvents(0);
$i = 0;
$numItems = count($events_data);
echo "[";
foreach ( $events_data as $item ) {
    $startdate = $item['date'];
    $subject = $item['subject'];
    $summary = json_encode($item['summary']);
    echo '{"date": "'.$startdate.'", "type": "meeting", "title": "'.$subject.'", "description": '.$summary.' }';
    if(++$i !== $numItems) {
        echo ",";
    }
}
echo "]";
?>
