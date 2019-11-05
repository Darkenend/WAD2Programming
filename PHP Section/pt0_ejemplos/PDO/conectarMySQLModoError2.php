<?php
$dsn = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'admin.empresa';
$clave = '123_admin.empresa_321';

try {
    $dbh = new PDO($dsn, $usuario, $clave);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'conexión realizada con éxito';
    $dbh = null; //así se cierra
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}
?>