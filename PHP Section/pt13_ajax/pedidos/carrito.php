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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>Carrito de la compra</title>
</head>

<body>
<div class="container-fluid">
<?php
require 'cabecera.php';
// $productos -> array mixto (índice + asociativo) de registros de productos del carrito
$productos = cargarProductos(array_keys($_SESSION['carrito']));
if ($productos === FALSE) {
    echo '<p>No hay productos en el pedido</p>';
    exit;
}
echo '<h2 class="text-center">Carrito de la compra</h2>';
echo '<table class="table table-striped">';
echo '<thead class="thead-dark">';
echo '<tr>';
echo '<th scope="col">Nombre</th><th scope="col">Descripción</th><th scope="col">Peso</th><th scope="col">Unidades</th><th scope="col">Eliminar</th>';
echo '</tr>';
echo '</thead><tbody>';
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
    echo '<input name="unidades" type="number" min="1" max="'.$unidades.'" value="1">';
    echo '<input type="submit" value="eliminar">';
    echo '<input name="cod" type="hidden" value="' . $cod . '">'; //oculto. Importante que esté en el formulario
    echo '</form></td>';
    echo '</tr>';
}
echo '</tbody></table>';
?>
<hr>
<a href="procesarPedido.php" class="btn btn-outline-success">Realizar pedido</a>
</div>
</body>
</html>
