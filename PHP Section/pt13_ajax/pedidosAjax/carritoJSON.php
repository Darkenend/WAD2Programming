<?php
require 'sesionesJSON.php';
require_once '../pedidos/bd.php';
if (!comprobarSesion()) return;

$productos = cargarProductos(array_keys($_SESSION['carrito']));

//añadir las unidades
$productos = iterator_to_array($productos);
foreach($productos as &$producto) {
    $cod = $producto['CodProd'];
    $producto['unidades'] = $_SESSION['carrito'][$cod];
}
// devuelve un array JSON con los datos de los productos 
// presentes en el carrito y las unidades pedidas 
echo json_encode($productos); //result para AJAX