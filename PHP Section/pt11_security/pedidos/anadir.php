<?php
/**
 * Se encarga de añadir elementos al carrito
 * Modifica la variable de sesión y redirige a carrito.php
 */
// TODO: Check cart can't go over stock in DB

require_once 'sesiones.php';
require_once 'bd.php';

//Comprueba que el usuario haya abierto sesión o redirige
comprobarSesion();

$cod = $_POST['cod'];
$max_stock = getCurrentStock($cod);
$max_stock = (int) $max_stock['Stock'];
if ($unidades > $max_stock) {
    $unidades = $max_stock;
} else {
    $unidades = (int)$_POST['unidades'];
}


//Si existe el código sumamos las unidades
if (isset($_SESSION['carrito'][$cod])) {
    $_SESSION['carrito'][$cod] += $unidades;
} else { //Si no, se crea
    $_SESSION['carrito'][$cod] = $unidades;
}

// Mostramos el carrito
header('Location: carrito.php');
