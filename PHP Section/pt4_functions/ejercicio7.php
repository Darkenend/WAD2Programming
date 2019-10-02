<?php
calculateVAT(1000);
calculateVAT(1000, 8);
calculateVAT(10, 0);

function calculateVAT(int $a, int $b = 18) {
    $res = $a + $a * ($b/100);
    echo "Valor: $a<br>";
    echo "IVA: $b%<br>";
    echo "Total: $res<br><br><br>";
}