<?php
if (!isset($_GET['nombre']) or !isset($_GET['apellido']))
    $frase='El programa no recibió los parámetros correctos';
else {
    $nombre = strtolower(trim($_GET['nombre'], '/'));
    $apellido = strtoupper(trim($_GET['apellido'], '/'));
    $frase = "Su nombre es $nombre su apellido es $apellido";
}
echo $frase . '<br>';
$frase = str_ireplace('e', 3, $frase);
echo $frase . '<br>';
?>