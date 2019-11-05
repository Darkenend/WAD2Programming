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
    echo 'Conexión a la BD realizada con éxito<br>';
    
    //usamos query directamente sobre el dbhandler y retorna un PDOStatement
    //sobre el que hacemos fetch/fetchAll aplicando estilo de devolución
    $stmt = $bd->query("select * from Clientes");
    $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($clientes as $cliente) {
      echo $cliente->nombre. '<br>';
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