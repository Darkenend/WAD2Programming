<?php
$dsn = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'admin.empresa';
$clave = '123_admin.empresa_321';
$options = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_PERSISTENT => true //solo es persistente si se pasa somo array
);
try {
    $dbh = new PDO($dsn, $usuario, $clave, $options);
    echo 'conexión realizada con éxito';
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}
?>