<?php
require 'Base.php';
// Variable initial declaration
$calendarName = "";
$startDate = null;
$endDate = null;
$startVacation = [];
$endVacation = [];
$dayVacation = [];
$dayEvaluation = [];

// Block for variable assignation
if (isset($_POST['calendarName'])) {
    $calendarName = $_POST['calendarName'];
} else {
    $calendarName = "Default Calendar Name";
}
if (isset($_POST['startDate'])) {
    try {
        $startDate = new DateTime($_POST['startDate']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    $startDate = new DateTime('2019-09-09');
}
if (isset($_POST['endDate'])) {
    try {
        $endDate = new DateTime($_POST['endDate']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    $endDate = new DateTime('2020-06-16');
}

// Loops to store in Arrays
for ($i = 0; $i < 3; $i++) {
    $string = 'Vacation' . ($i + 1);
    if (isset($_POST['start' . $string]) && $_POST['start' . $string] != "") {
        try {
            $startVacation[$i] = new DateTime($_POST['start' . $string]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    if (isset($_POST['end' . $string]) && $_POST['end' . $string] != "") {
        try {
            $endVacation[$i] = new DateTime($_POST['end' . $string]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
for ($i = 0; $i < 12; $i++) {
    $str = 'dayVacation' . ($i + 1);
    if (isset($_POST[$str]) && $_POST[$str] != "") {
        try {
            $dayVacation[$i] = new DateTime($_POST[$str]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
for ($i = 0; $i < 4; $i++) {
    $str = 'dayEvaluation' . ($i + 1);
    if (isset($_POST[$str]) && $_POST[$str] != "") {
        try {
            $dayEvaluation[$i] = new DateTime($_POST[$str]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

$myCalendar = new Base($startDate, $endDate, $startVacation, $endVacation, $dayVacation, $dayEvaluation);
$monthDelta = intval(date_diff($myCalendar->getStartDate(), $myCalendar->getEndDate(), true)->format('%m')) + 1;
try {
    $tempDate = new DateTime($myCalendar->getStartDate()->format('Y-m').'-1');
} catch (Exception $e) {
    echo $e->getMessage();
}

// Start of the web page, setting a Bootstrap-based layout
require "views/html_top.views.php";
echo "<div class=\"container-fluid pt-3\">";
echo "<div class=\"row\">";
echo "<div class=\"col-4 offset-4\">";
echo "<h1 class='text-center'>" . $calendarName . "</h1><br>";
echo "</div></div>";
echo "<div class=\"row\">";
for ($m = 0; $m < $monthDelta; $m++) {
    $days_in_month = cal_days_in_month(CAL_GREGORIAN, intval($tempDate->format('m')), intval($tempDate->format('Y')));
    // setting up the div
    echo "<div class='col-4'>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='thead-dark'>";
    echo "<tr><th colspan='7'>" . $tempDate->format('F-Y') . "</th></tr>";
    echo "<tr><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr>";
    echo "</thead>";
    for ($i = 0; $i < 42; $i++) {
        try {
            $tempDateDay = new DateTime($tempDate->format('Y-m-') . ($i + 1));
        } catch (Exception $e) {
        }
        if ($i < $days_in_month) {
            $week_day_num = $tempDateDay->format('N');
            if ($i === 0) {
                for ($j = 1; $j < $week_day_num; $j++) {
                    echo "<td></td>";
                }
                $period_check = "";
                $vacation_check = "";
                $evaluation_check = "";
                if ($week_day_num <= 5) {
                    // $period_check = $myCalendar->checkPeriod($tempDateDay);
                    if ($myCalendar->checkVacationDay($tempDateDay) || $myCalendar->checkVacationPeriod($tempDateDay)) {
                        $vacation_check = "table-danger ";
                    }
                    if ($myCalendar->checkEvaluationDay($tempDateDay)) {
                        $evaluation_check = "table-dark ";
                    }
                }
                echo "<td class='".$period_check.$vacation_check.$evaluation_check."'>";
                echo ($i+1)."</td>";
                // If the day is a sunday, it will jump row afterwards
                if ($week_day_num == 7) {
                    echo "</tr><tr>";
                }
            } else {
                echo "<td>".($i+1)."</td>";
                // If the day is a sunday, it will jump row afterwards
                if ($week_day_num == 7) {
                    echo "</tr><tr>";
                }
            }
        }
    }
    echo "</div><br>";
    //move temp to next
    $tempDate = $tempDate->add(new DateInterval('P1M'));
}
for ($i = 0; $i < 3; $i++) {
    echo "</div>";
}
require "views/html_bot.views.php";

/**
 * @param int $num Number of the period which this date it's in
 * @return string Class to add to the table cell
 */
function classAssignerPeriod(int $num): string {
    switch ($num) {
        default:
            return "";
            break;
        case 1:
            return "table-primary ";
            break;
        case 2:
            return "table-success ";
            break;
        case 3:
            return "table-warning ";
            break;
        case 4:
            return "table-info ";
            break;
    }
}