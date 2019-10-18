<?php
session_start(); //unirse a la sesión
$_SESSION = array();
session_destroy(); //eliminar la sesión
setcookie(session_name(), "123", time() - 1000); //eliminar la cookie
header("Location: sesiones1Login.php");
die();