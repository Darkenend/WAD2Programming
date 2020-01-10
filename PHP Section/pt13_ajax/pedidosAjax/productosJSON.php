<?php
require_once '../pedidos/bd.php';
require_once 'sesionesJSON.php';
if (!comprobarSesion()) return;

$prod = cargarProductosCategoria($_GET['categoria']);

$prodJSON = json_encode(iterator_to_array($prod));

echo $prodJSON; //result para AJAX