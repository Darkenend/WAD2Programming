<?php
/**
 * Muestra una tabla con todos los elementos de una categoría
 * y permite añadirlos al carrito. Cada fila tiene:
 *  - Los datos de un producto(Nombre, Descripción, Peso, Stock).
 *  - El campo del código del producto está oculto. (CodProd)
 *  - Un formulario al final para añadir una o más unidades de ese producto al carrito
 * Al hacer click a un botón comprar se llama a anadir.php
 */

require 'sesiones.php';
require_once 'bd.php';
//comprueba que el usuario haya abierto sesión o redirige
comprobarSesion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tabla de productos por categoría</title>
</head>

<body>

<?php
require 'cabecera.php';

//Esta página se carga por URL: productos.php?categoria='xxxxxxx'.
//En $cat --> array mixto (indice + asociativo) con nombre y descripción de $_GET['categoria']
$cat = cargarCategoria($_GET['categoria']);
//En $productos --> array mixto (indice + asociativo) con todos los campos de los productos de $_GET['categoria']
$productos = cargarProductosCategoria($_GET['categoria']);
if ($cat === FALSE or $productos === FALSE) {
	echo '<p class = "error">Error al conectar con la base de datos</p>';
	exit;
}
echo '<h1>' . $cat["nombre"] . '</h1>';
echo '<p>' . $cat["descripcion"] . '</p>';
echo '<table>';
echo '<tr>';
echo '<th>Nombre</th><th>Descripción</th><th>Peso</th><th>Stock</th><th>Comprar</th>';
echo '</tr>';
foreach ($productos as $producto) {
	//var_dump($producto); echo '<br>'; //debug
	$cod = $producto["CodProd"];
	$nom = $producto["Nombre"];
	$des = $producto["Descripcion"];
	$peso = $producto["Peso"];
	$stock = $producto["Stock"];
	echo '<tr>';
	echo '<td>' . $nom . '</td>';
	echo '<td>' . $des . '</td>';
	echo '<td>' . $peso . '</td>';
	echo '<td>' . $stock. '</td>';
	echo '<td>';
	echo '<form action = "anadir.php" method="POST">';
	echo '<input name="unidades" type="number" min="1" value="1">';
	echo '<input type="submit" value="comprar">';
	//Código oculto para que no lo vea el usuario. IMPORTANTE -> dentro del form
	echo '<input name="cod" type="hidden" value="' . $cod . '">';
	echo '</form>';
	echo '</td>';
	echo '</tr>';
}
echo '</table>';
?>

</body>
</html>
