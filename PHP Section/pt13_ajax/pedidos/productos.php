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
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>Tabla de productos por categoría</title>
</head>

<body>
<div class="container-fluid">
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
echo '<h1 class="text-center">' . $cat["nombre"] . '</h1>';
echo '<p class="text-center">' . $cat["descripcion"] . '</p>';
echo '<table class="table table-striped">';
echo '<thead class="thead-dark">';
echo '<tr>';
echo '<th scope="col">Nombre</th><th scope="col">Descripción</th><th scope="col">Peso</th><th scope="col">Unidades</th><th scope="col">Eliminar</th>';
echo '</tr>';
echo '</thead><tbody>';
foreach ($productos as $producto) {
    //var_dump($producto); echo '<br>'; //debug
    $cod = $producto["CodProd"];
    $nom = $producto["Nombre"];
    $des = $producto["Descripcion"];
    $peso = $producto["Peso"];
    $stock = $producto["Stock"];
    if ($stock >= 1) {
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
        echo '<input name="stock" type="hidden" value="'.$stock.'">';
        echo '<input name="cat" type="hidden" value="'.$_GET['categoria'].'">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
}
echo '</tbody></table>';
echo '<br>';
echo '<p><small>En caso de pedir mas productos de los que hay en stock, solo se añadiran los productos en stock</small></p>';
?>
</div>
</body>
</html>
