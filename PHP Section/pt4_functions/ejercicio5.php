<?php
if (isset($_GET['axd']) && isset($_GET['bxd'])) {
    $a = $_GET['axd'];
    $b = $_GET['bxd'];
    $c = sum($a, $b);
    echo "La suma de $a y $b es: $c";
}

function sum(int $n1, int $n2) {
    return $n1 + $n2;
}