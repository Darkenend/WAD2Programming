<?php
/**
 * cabecera común a todas las páginas una vez se hace login.
 * Muestra:
 *  - usuario conectado
 *  - enlace para volver a la página principal (categorias.php)
 *  - enlace para ver el carrito (carrito.php)
 *  - enlace para desconectar (logout.php)
 */
?>
<header>
    Usuario:
    <?php
    //correo
    echo $_SESSION['usuario']['correo'] . ' ';
    ?>
    <a href="categorias.php">Home</a>
    <a href="carrito.php">Ver carrito</a>
    <a href="logout.php">Cerrar sesión</a>

</header>
<hr>
