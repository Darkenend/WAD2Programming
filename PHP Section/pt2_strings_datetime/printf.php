<?php
    $ciclo="DAW";
    $modulo="DWES";
    print "<p>";
    printf("%s es un módulo de %d curso de %s", $modulo, 2, $ciclo);
    print "</p>";
    printf("<p> %s es un módulo de %+04d curso de %s <p>", $modulo, 2, $ciclo);
    printf("<p> %s es un módulo de %05b curso de %s <p>", $modulo, 2, $ciclo);
    printf("<p> %10s es un módulo de %d curso de %s", $modulo, 2, $ciclo);
    printf("<pre> %-10s es un módulo de %d curso de %s", $modulo, 2, $ciclo);