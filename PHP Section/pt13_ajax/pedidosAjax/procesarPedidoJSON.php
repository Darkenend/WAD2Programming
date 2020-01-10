<?php
require '../correo/correo.php';
require_once '../pedidos/bd.php';
/*comprueba que el usuario haya abierto sesión o sale*/
require 'sesionesJSON.php';
if (!comprobarSesion()) return;

/*
* Devuelve las cadenas TRUE o FALSE según se haya podido insertar el pedido o no
*/

$resul = insertarPedido($_SESSION['carrito'], $_SESSION['usuario']['codRes']);
if ($resul === FALSE) {
    echo "FALSE"; //result para AJAX
} else {
    $correo = $_SESSION['usuario']['correo'];
    $conf = enviarCorreos($_SESSION['carrito'], $resul, $correo);
    echo "TRUE"; //result para AJAX
    //vaciar carrito
    $_SESSION['carrito'] = [];
}