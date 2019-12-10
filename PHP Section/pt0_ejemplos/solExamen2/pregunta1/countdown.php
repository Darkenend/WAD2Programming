<?php
//crear o unirse a la sesión
session_start();
$mensaje = '&nbsp;';
//primera vez
if (!isset($_SESSION['bolas'])) {
    //Número de bolas que hay que mostrar
    $_SESSION['bolas'] = 10;
    //var_dump($_SESSION['bolas']); //debug

//se ha dado al enlace de comenzar de nuevo    
} elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
    //comprobamos
    if (isset($_GET['comenzar']) && $_GET['comenzar'] === 'yes') {
        $_SESSION['bolas'] = 10;
        //Al redirigir se borra el $_GET
        header('Location: countdownSol.html.php');
    }
//se ha pulsado el botón
} elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_SESSION['bolas'] > 0) {
            $_SESSION['bolas']--;
            //var_dump($_SESSION['bolas']); //debug
            //Al redirigir se borra el $_POST
            header('Location: countdownSol.html.php');
        } //si no quedan bolas -> mismo estado
        if ($_SESSION['bolas'] === 0) $mensaje = '¡La cuenta atrás ha terminado!¡Va a estallar el obús!';
} else { //se ha recargado la página 
        if ($_SESSION['bolas'] === 0) $mensaje = '¡La cuenta atrás ha terminado!¡Va a estallar el obús!';
}