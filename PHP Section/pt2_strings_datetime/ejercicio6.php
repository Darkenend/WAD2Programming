<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
setlocale(LC_ALL, 'es_ES');
$year=1998;
$month=1;
$day=11;
$date=mktime(10,11,7, $month, $day, $year);
$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
echo "Nací el ".date( 'l', $date).", ".date('d', $date)." de ".date('F', $date)." del ".date('Y', $date);
echo "<br>";
echo "<br>";
echo "<table><tr>";
//Fill first 7 slots
echo "<th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sa</th><th>Do</th></tr><tr>";
//Loop to fill the next 42 slots
for ($i = 0; $i < 42; $i = $i + 1) {
    $temp_time = mktime(10, 11, 7, $month, ($i+1), $year);
    //This is done in order to write blanks after you're done
    if ($i < $days_in_month) {
        $week_day_num = getWeekDayNumber($temp_time);
        if ($i === 0) {
            for ($j = 1; $j < $week_day_num; $j = $j + 1) {
                echo "<td></td>";
            }
            echo "<td>".($i+1)."</td>";
            // If the day is a sunday, it will jump row afterwards
            if ($week_day_num == 7) {
                echo "</tr><tr>";
            }
        } else {
            if (($i+1) === $day ) {
                echo "<td style='color:red'>".($i+1)."</td>";
            } else {
                echo "<td>".($i+1)."</td>";
            }
            // If the day is a sunday, it will jump row afterwards
            if ($week_day_num == 7) {
                echo "</tr><tr>";
            }
        }
    } else {
        echo "<td></td>";
    }
}
//Close table
echo "</tr></table>";

function getWeekDayNumber($date) {
    $week_day_number = date('N', $date);
    return $week_day_number;
}
?>
</body>
</html>
