<?php
//Comprueba que el usuario haya iniciado sesión o sale del script en caso contrario
require_once 'sesionesJSON.php';
if (!comprobarSESION()) return;

$cod = $_POST['cod'];
$unidades = (int)$_POST['unidades'];

//si existe el código restamos las unidades con un mínimo de 0
if (isset($_SESSION['carrito'][$cod])) {
    $_SESSION['carrito'][$cod] -= $unidades;
    if ($_SESSION['carrito'][$cod] <= 0) {
        unset($_SESSION['carrito'][$cod]);
    }
} /* else {} -> imposible */