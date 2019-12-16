<?php
require_once '../pedidos/bd.php';
/*
 * Procesa los datos del formulario
 * @return false si hay error.
 * @return true si nombre de usuario y contraseña son correctos, 
 *  en este caso inicia sesión (en $_SESSION guarda los datos
 *  del usuario e inicializa el carrito) 
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //var_dump($_POST); //depuración
    $usu = comprobarUsuario($_POST["usuario"], $_POST["clave"]);
    if ($usu === FALSE) {
        echo "FALSE"; // esto va en response para AJAX
    } else {
        session_start();
        // $usu tieme campos correo y codRes
        $_SESSION['usuario'] = $usu;
        $_SESSION['carrito'] = [];
        echo "TRUE"; // esto va en response para AJAX
    }
}
