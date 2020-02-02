<?php
/**
 * función que será llamada desde todas las páginas de la aplicación
 * excepto login.php y logout.php. Hace 2 cosas:
 *  1. Unirse a la sesión
 *  2. Comprobar que se haya hecho login. Si no se ha hecho se redirige a login.php
 */
function comprobarSesion() {
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: login.php?redirigido=true');
    }
}