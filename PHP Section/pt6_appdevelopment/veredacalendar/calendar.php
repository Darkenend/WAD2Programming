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
$monthDelta = date_diff($myCalendar->getStartDate(), $myCalendar->getEndDate(), true)->format("m");
echo $monthDelta."<br>";

// Start of the web page, setting a Bootstrap-based layout
require "views/html_top.views.php";
echo "<div class=\"container-fluid pt-3\">";
echo "<div class=\"row\">";
echo "<div class=\"col-4 offset-4\">";
echo "<h1 class='text-center'>" . $calendarName . "</h1><br>";
for ($i = 0; $i < 6; $i++) {
    echo "placeholder";
}
for ($i = 0; $i < 3; $i++) {
    echo "</div>";
}
require "views/html_bot.views.php";