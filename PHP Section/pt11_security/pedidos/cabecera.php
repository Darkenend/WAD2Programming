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
<navbar class="navbar navbar-expand-lg navbar-light bg-light">
    <p class="navbar-brand mt-3">
        Usuario:
        <?php
        //correo
        echo $_SESSION['usuario']['correo'] . ' ';
        ?>
    </p>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mr-3">
                <a href="categorias.php" class="nav-item">Home</a>
            </li>
            <li class="nav-item mr-3">
                <a href="carrito.php" class="nav-item">Ver carrito</a>
            </li>
            <li class="nav-item mr-3">
                <a href="logout.php" class="nav-item">Cerrar sesión</a>
            </li>
        </ul>
    </div>
</navbar>
<hr>