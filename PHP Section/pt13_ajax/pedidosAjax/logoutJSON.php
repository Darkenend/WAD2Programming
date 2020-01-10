<?php
session_start();
$_SESSION = array(); //eliminar info de sesión
session_destroy();  //eliminar sesión
setcookie(session_name(), 123, time() - 1000); //eliminar cookie de sesión