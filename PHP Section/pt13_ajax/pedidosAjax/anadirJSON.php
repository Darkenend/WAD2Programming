<?php
//Comprueba que el usuario haya iniciado sesión o sale del script en caso contrario
require 'sesionesJSON.php';
if (!comprobarSESION()) return;

$cod = $_POST['cod'];
$unidades = (int)$_POST['unidades'];

//si existe el código sumamos las unidades
if (isset($_SESSION['carrito'][$cod])) {
    $_SESSION['carrito'][$cod] += $unidades;
} else { //sino se añade el código del producto (indice asociativo) junto con las unidades
    $_SESSION['carrito'][$cod] = $unidades;
}
