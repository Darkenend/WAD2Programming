<?php
require_once 'sesionesJSON.php';
require_once '../pedidos/bd.php';
if (!comprobarSesion()) return;

//$cat es PDOStatement que implementa la interfaz Traversable
$cat = cargarCategorias();

//$cat puede ser pasado a array al implementar Traversable
$catJSON = json_encode(iterator_to_array($cat));

echo $catJSON; //result para AJAX