<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

echo "<h1>".'&lt&lt'.'Calendario'.'>>'."</h1>";
echo "<br><br><br><br>";
$days_in_month = cal_days_in_month(CAL_GREGORIAN, date("n", time()), date("Y", time()));
for ($i = 0; $i < $days_in_month; $i = $i + 1) {
    $temp_time = ($i+1).date("n", time()).date("Y", time());
    echo "Dia ".($i+1).": ".date("l", $temp_time)."<br>";
}
?>
</body>
</html>
