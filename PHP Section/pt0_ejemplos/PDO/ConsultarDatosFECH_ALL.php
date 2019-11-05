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
    echo 'Conexión a la base de datos realizada con éxito<br>';
    
    //FETCH_ASSOC
    $stmt = $bd->prepare('select * from Clientes');
    //Ejecutamos
    $stmt->execute();
    //Obtenemos todas las tuplas en un array
    //También podemos indicar el estilo de devolución
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($clientes as $cliente) {
        echo $cliente['nombre'] . '<br>';
    }

    //FETCH_OBJ
    $stmt = $bd->prepare('select * from Clientes');
    //Ejecutamos
    $stmt->execute();
    //Obtenemos todas las tuplas en un array
    //También podemos indicar el estilo de devolución
    $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($clientes as $cliente) {
        echo $cliente->nombre . '<br>';
    }
    
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage() . '<br>';
} finally {
    if (isset($bd)) {
      $bd = null;
      echo 'Desconexión realizada con éxito!';
    }
}
?>