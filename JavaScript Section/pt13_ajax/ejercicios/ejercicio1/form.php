<?php
if (isset($_POST['evalnum'])) {
    $number = $_POST['evalnum'];
    if ( $number < 2 ) {
        echo 0;
        return;
    }
    // 2 is the only even prime number
    if ( $number == 2 ) {
        echo 1;
        return;
    }
    // square root algorithm speeds up testing of bigger prime numbers
    $x = sqrt($number);
    $x = floor($x);
    for ( $i = 2 ; $i <= $x ; ++$i ) {
        if ( $number % $i == 0 ) {
            break;
        }
    }
    if ($x == $i-1) echo 1;
    else echo 0;
}