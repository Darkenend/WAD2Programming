<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$start = new DateTime('first day of this month');
$interval = new DateInterval('P1D');
$end = new DateTime('last day of this month');
$skip = new DatePeriod($start, $interval, $end);

echo "<h1>".'&lt&lt'.'Calendario'.'>>'."</h1>";
echo "<br>";

foreach ($skip as $date) echo 'Dia '.$date->format('d').': '.$date->format('l').'<br>';

?>
</body>
</html>
