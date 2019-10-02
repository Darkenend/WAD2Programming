<?php
if (isset($_GET['axd']) && isset($_GET['bxd']) && isset($_GET['cxd'])) {
    $a = $_GET['axd'];
    $b = $_GET['bxd'];
    $c = $_GET['cxd'];
    $lmao = checkEqualSides($a, $b, $c);
    switch ($lmao) {
        case 0:
            echo "El triangulo es escaleno";
            break;
        case 1:
            echo "El triangulo es isosceles";
            break;
        case 2:
            echo "El triangulo es equilatero";
            break;
    }
}

function checkEqualSides(int $n1, int $n2, int $n3) {
    $eq = 0;
    if ($n1 === $n2) {
        $eq++;
    }
    if ($n1 === $n3) {
        $eq++;
    }
    if ($eq == 2) {
        return $eq;
    }
    if ($n2 === $n3) {
        $eq++;
    }
    return $eq;
}