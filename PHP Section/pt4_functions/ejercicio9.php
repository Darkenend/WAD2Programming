<?php
if (isset($_GET['datemode'])) {
    $mode = $_GET['datemode'];
    if ($mode != 0 && $mode != 1) {
        $mode = 0;
    }
    fecha($mode);
} else {
    echo "<br><br><h2>El resultado va aqui</h2>";
}

function fecha($mode_in) {
    /*
     * 0 Segundos
     * 1 Minuto
     * 2 Hora
     * 3 Dia
     * 4 Mes
     * 5 Año
     */
    $value = ["", "", "", "", "", ""];
    if ($mode_in === 0) {
        $value[0] = date('s');
        $value[1] = date('i');
        $value[2] = date('H');
        $value[3] = date('d');
        $value[4] = date('m');
        $value[5] = date('y');
    } else {
        $value[0] = date('s');
        $value[1] = date('i');
        $value[2] = date('H');
        $value[3] = date('j');
        $value[4] = date('n');
        $value[5] = date('Y');
    }
    $storage = ["Ejemplo 1: $value[3]/$value[4]/$value[5] $value[2]:$value[1]:$value[0]", "Son las $value[2] : $value[1] : $value[0] y hoy es $value[3]-$value[4]-$value[5]"];
    echo "$storage[$mode_in]<br>";
}
?>