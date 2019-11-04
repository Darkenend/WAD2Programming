<?php
//días de cada mes
$mes = [null, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
//errores detectados en la fecha
$error = [];
if (!empty($_GET['fecha'])) {
    $fecha = explode('/', $_GET['fecha']);
    comprobarBisiesto($fecha[2], $mes[2]);
    if (comprobarMes($fecha[1], $error)) {
        comprobarDia($mes[(int)$fecha[1]], $fecha[0], $error);
    }
    if (empty($error)) {
        echo 'La fecha introducida es correcta';
    } else {
        echo 'La fecha introducida es incorrecta por: <ul>';
        foreach ($error as $mensaje) {
            echo "<li>$mensaje</li>";
        }
        echo '</ul>';
    }
}
function comprobarBisiesto(int $anyo, &$mes) {
    if ($anyo % 4 != 0) { $mes = 28; }
    elseif (($anyo % 100 != 0) || (($anyo % 100 == 0) && ($anyo % 400 == 0))) { $mes = 29; }
}
function comprobarDia($diasMes, $dia, &$error) {
    if ($dia <= 0 || $dia > $diasMes) {
        $error[]= "El día introducido no existe";
    }
}
function comprobarMes($mes, &$error) {
    if ($mes > 0 && $mes < 13) {
        return true;
    } else {
        $error[] = "El mes introducido no existe";
        return false;
    }
}

?>