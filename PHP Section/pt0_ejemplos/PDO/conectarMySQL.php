<?php
$dsn = "mysql:host=localhost;dbname=empresa";
$usuario = 'admin.empresa';
$clave = '123_admin.empresa_321';
try {
    $dbh = new PDO($dsn, $usuario, $clave);
    echo 'Conexión realizada con éxito';
    $dbh = null; //así se cierra
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}
?>