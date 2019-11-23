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
    <title>Lista de categorías</title>
</head>

<body>

<?php
require 'cabecera.php';
?>
<h1>Lista de categorías</h1>
<!-- lista de vínculos con la forma productos.php?categoria=1 -->
<?php
$filas = cargarCategorias();
if ($filas === FALSE) {
    echo '<p class="error">Error al conectar con la base de datos</p>';
} else {
    echo '<ul>';
    foreach ($filas as $fila) {
        $url = 'productos.php?categoria=' . $fila["codCat"];
        echo '<li><a href="' . $url . '">' . $fila['nombre'] . '</a></li>';
    }
    echo '</ul>';
}
?>
</body>
</html>
