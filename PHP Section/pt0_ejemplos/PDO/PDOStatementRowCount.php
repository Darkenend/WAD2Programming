<?php
$cadenaConexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'admin.empresa';
$clave = '123_admin.empresa_321';
$options = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
try {
    $bd = new PDO($cadenaConexion, $usuario, $clave, $options);
    echo 'Conexión a la BD realizada con éxito<br>';
    
    $stmt = $bd->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    echo $stmt->rowCount() . '<br>';
    
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage() . '<br>';
} finally {
    if (isset($bd)) {
        $bd = null;
        echo 'Desconexión realizada con éxito!';
    }
}