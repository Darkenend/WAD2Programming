<?php
/**
 * Se encarga de eliminar elementos del carrito.
 * Modifica la variable de sesión y redirige a carrito.php
 */ 

require_once 'sesiones.php';
//Comprueba que el usuario haya abierto sesión o redirige
comprobarSesion();

//Esto viene del formulario de carrito.php -> unidades y código de producto
$cod = $_POST['cod'];
$unidades = $_POST['unidades'];
//Si existe el código restamos las unidades, con mínimo de 0
if (isset($_SESSION['carrito'][$cod])) {
    $_SESSION['carrito'][$cod] -= $unidades;
    // si las unidades restantes son menores o igual a 0 se elimina el producto del carrito
    if ($_SESSION['carrito'][$cod] <= 0) {
        unset($_SESSION['carrito'][$cod]);
    }
}
header('Location: carrito.php');
