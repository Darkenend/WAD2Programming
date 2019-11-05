<?php
$cadenaConexion = 'mysql:dbname=pdo_clientes;host=127.0.0.1';
$usuario = 'admin.pdo_clientes';
$clave = '123_admin.pdo_clientes_321';
$options = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
try {
    $bd = new PDO($cadenaConexion, $usuario, $clave, $options);
    echo 'Conexión realizada con éxito<br>';
    
    $bd->beginTransaction();
    $bd->query("insert into Clientes(nombre, ciudad) values('Leila Birdsall', 'Madrid')");
    $bd->query("insert into Clientes(nombre, ciudad) values('Brice Osterberg', 'Teruel')");
    $bd->query("insert into Clientes(nombre, ciudad) values('Latrisha Wagar', 'Valencia')");
    $bd->query("insert into Clientes(nombre, ciudad) values('Hui Riojas', 'Madrid')");
    $bd->query("insert into Clientes(nombre, ciudad) values('Frank Scarpa', 'Barcelona')");
    $bd->commit();
    
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage() . '<br>';
} finally {
    if (isset($bd)) {
      $bd = null;
      echo 'Desconexión realizada con éxito!';
    }
}
?>