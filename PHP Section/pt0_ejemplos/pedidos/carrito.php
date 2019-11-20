<?php
/**
 * Muestra una tabla con una fila por cada producto diferente del carrito.
 * Por cada fila:
 * 	- Datos del producto y número de unidades pedidas
 * 	- Un formulario para eliminar productos del carrito: unidades a eliminar + código producto (oculto)
 * Al hacer click se envía a eliminar.php
 * También aparece un link para procesar el pedido del carrito -> procesarPedido.php
 */

require_once 'sesiones.php';
require_once 'bd.php';
//comprueba que el usuario haya abierto sesión o redirige
comprobarSesion();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Carrito de la compra</title>
</head>

<body>

<?php
require 'cabecera.php';
// $productos -> array mixto (índice + asociativo) de registros de productos del carrito
$productos = cargarProductos(array_keys($_SESSION['carrito']));
if ($productos === FALSE) {
	echo '<p>No hay productos en el pedido</p>';
	exit;
}
echo '<h2>Carrito de la compra</h2>';
echo '<table>';
echo '<tr>';
echo '<th>Nombre</th><th>Descripción</th><th>Peso</th><th>Unidades</th><th>Eliminar</th>';
echo '</tr>';
foreach ($productos as $producto) {
	$cod = $producto['CodProd'];
	$nom = $producto['Nombre'];
	$des = $producto['Descripcion'];
	$peso = $producto['Peso'];
	$unidades = $_SESSION['carrito'][$cod]; //Las unidades están en el carrito
	echo '<tr>';
	echo '<td>' . $nom . '</td>';
	echo '<td>' . $des . '</td>';
	echo '<td>' . $peso . '</td>';
	echo '<td>' . $unidades . '</td>';
	echo '<td><form action = "eliminar.php" method="POST">';
	echo '<input name="unidades" type="number" min="1" value="1">';
	echo '<input type="submit" value="eliminar">';
	echo '<input name="cod" type="hidden" value="' . $cod . '">'; //oculto. Importante que esté en el formulario
	echo '</form></td>';
	echo '</tr>';
}
echo '</table>';
?>
<hr>
<a href="procesarPedido.php">Realizar pedido</a>
</body>
</html>
