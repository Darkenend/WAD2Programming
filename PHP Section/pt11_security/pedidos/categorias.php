<?php
/**
 * Página principal: muestra una lista con las categorías.
 * Cada categoría será un enlace que pasará por GET a productos.php el codCat
 */
require 'sesiones.php';
require_once 'bd.php';
//Se une a la sesión y Comprueba que el usuario haya hecho login (redirige en caso contrario)
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
    <title>Lista de categorías</title>
</head>

<body>

<?php
require 'cabecera.php';
?>
<div class="container-fluid">
<h1 class="text-center">Lista de categorías</h1>
<!-- lista de vínculos con la forma productos.php?categoria=1 -->
<div class="list-group">
<?php
$filas = cargarCategorias();
if ($filas === FALSE) {
    echo '<div class="alert alert-danger" role="alert">Error al conectar con la base de datos</div>';
} else {
    foreach ($filas as $fila) {
        $url = 'productos.php?categoria=' . $fila["codCat"];
        echo '<a href="' . $url . '" class="list-group-item list-group-item-action">' . $fila['nombre'] . '</a></li>';
    }
}
?>
</div>
</div>
</body>
</html>