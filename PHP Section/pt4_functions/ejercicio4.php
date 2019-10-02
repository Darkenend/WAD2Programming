<?php
if (isset($_GET['basexd']) && isset($_GET['expxd'])) {
    $base = $_GET['basexd'];
    $exp = $_GET['expxd'];
    if (!isset($_GET['basexd'])) {
        $base = 2;
    }
    if (!isset($_GET['expxd'])) {
        $exp = 2;
    }
    $result = mathproc($base, $exp);
    echo "Base: $base<br>";
    echo "Exponente: $exp<br>";
    echo "Resultado: $result";
}

function mathproc(int $a, int $b) {
    $number = 0;
    if ($b === 0) {
        $number = 1;
    } else {
        for ($i = 0; $i < $b; $i++) {
            if ($number === 0) {
                $number+=$a;
            } else {
                $number=$number*$a;
            }
        }
    }
    return $number;
}