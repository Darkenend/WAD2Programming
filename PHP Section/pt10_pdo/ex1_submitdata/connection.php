<?php
$dsn = "mysql:host=localhost;dbname=prueba";
$usuario = 'darkenend';
$clave = 'Twoseven3';
try {
    $dbh = new PDO($dsn, $usuario, $clave);
    echo 'Conexión realizada con éxito';
    $dbh = null; //así se cierra
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}