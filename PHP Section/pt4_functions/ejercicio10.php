<?php
if (isset($_GET['user_date'])) {
    $string_date = $_GET['user_date'];
    $date_valid = true;
    $leap_year = false;
    $year_valid = true;
    if (!isset($_GET['user_date'])) {
        $string_date = '11-01-1998';
    }
    $string_date_check = explode('-', $string_date);
    $year = (int)$string_date_check[2];
    $month = (int)$string_date_check[1];
    $day = (int)$string_date_check[0];
    if ($year < 0) {
        $year_valid = false;
        $date_valid = false;
    }

    //Leap Year Check
    if ($year_valid != false) {
        if ($year % 4 != 0) {
            $leap_year = false;
        }
        if ($year % 4 == 0 && $year % 100 != 0) {
            $leap_year = true;
        }
        if ($year % 100 == 0 && $year % 400 == 0) {
            $leap_year = true;
        }
    }

    //Date validation check
    $date_valid = checkBetween($month, 1, 12);
    if ($date_valid) {
        if ($leap_year == true) {
            if ($month == 2) {
                $date_valid = checkBetween($day, 1, 29);
            } else {
                if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
                    $date_valid = checkBetween($day, 1, 30);
                } else {
                    $date_valid = checkBetween($day, 1, 31);
                }
            }
        } else {
            if ($month == 2) {
                $date_valid = checkBetween($day, 1, 28);
            } else {
                if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
                    $date_valid = checkBetween($day, 1, 30);
                } else {
                    $date_valid = checkBetween($day, 1, 31);
                }
            }
        }
    }

    //Result Printing
    if ($date_valid) {
        echo "La fecha es valida<br>";
        if ($leap_year) {
            echo "El año es bisiesto";
        } else {
            echo "El año no es bisiesto";
        }
    } else {
        echo "La fecha es invalida";
    }
}

function checkBetween(int $value, int $min, int $max)
{
    if ($value < $min || $value > $max) {
        return false;
    } else {
        return true;
    }
}

?>