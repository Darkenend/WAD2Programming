<?php
averageTwoNumbers(4, 6);
averageTwoNumbers(3242, 524543);

function averageTwoNumbers(int $a, int $b)
{
    $res = ($a + $b) / 2;
    echo "Number 1: $a<br>";
    echo "Number 2: $b<br>";
    echo "Average: $res<br><br>";
}