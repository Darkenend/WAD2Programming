<?php
/**
 * Se encarga de añadir elementos al carrito
 * Modifica la variable de sesión y redirige a carrito.php
 */
// MEJORA: este fichero permite añadir más unidades de las disponibles para un producto.
// ¿Cómo se puede impedir?

require_once 'sesiones.php';
//Comprueba que el usuario haya abierto sesión o redirige
comprobarSesion();

//Esto viene del formulario de productos.php -> unidades y código de un producto
$cod = $_POST['cod'];
$unidades = (int)$_POST['unidades'];

//Si existe el código sumamos las unidades
if (isset($_SESSION['carrito'][$cod])) {
    $_SESSION['carrito'][$cod] += $unidades;
} else { //Si no, se crea
    $_SESSION['carrito'][$cod] = $unidades;
}

// Mostramos el carrito
header('Location: carrito.php');
