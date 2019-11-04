<?php
//Función de encabezado y colocación de título
function hacerEncabezado($titulo) {
    $encabezado = "<!DOCTYPE html>\n";
    $encabezado .= "<html>\n<head>\n\t<meta charset=\"UTF-8\">";
    $encabezado .= "\n\t<title>$titulo</title>\n</head>\n";
    echo $encabezado;
}
//separa con - cada una de las letras de una cadena pasada como parámetro
function escribeSepara($cadena) {
    for($i = 0; $i < strlen($cadena); $i++) {
        echo $cadena[$i];
        if ($i < strlen($cadena) - 1) echo "-";
    }
}
//mirar más ...
function mb_escribeSepara($cadena) {
    for($i = 0; $i < mb_strlen($cadena); $i++) {
        echo $cadena[$i];
        if ($i < mb_strlen($cadena) - 1) echo "-";
    }
}
function fechaHoy() {
    echo date('d/m/Y');
}
//Mostrar array asociativo monodimensional
function mostrarArray($array) {
    foreach($array as $clave=>$valor) {
        echo "$clave=>$valor<br>";
    }
}
?>