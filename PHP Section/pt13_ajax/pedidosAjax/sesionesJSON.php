<?php
/** 
 * Se une a la sesión y comprueba que el usuario haya sido acreditado
 * @return bool. true si el usuario ha sido acreditado o false en otro caso
 * los demás ficheros harán esta comprobación:
 *      require_once 'sesionesJSON.php';
 *      if (!comprobarSesion()) return;
 */

function comprobarSesion() {
    session_start();
    if (!isset($_SESSION['usuario'])) {
        return false;
    } else return true;
}
