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
    echo 'conexión realizada con éxito<br>';
    
    //FETCH_ASSOC
    $stmt = $bd->prepare('select * from Clientes');
    
    //Especificar FETCH MODE antes de llamar a fetch
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //Ejecutamos
    $stmt->execute();

    //Mostramos resultados
    while ($row = $stmt->fetch()) {
        echo "Nombre: {$row["nombre"]} <br>";
        echo "Ciudad: {$row["ciudad"]} <br><br>";
    }
    
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage(). '<br>';
} finally {
    if (isset($bd)) {
      $bd = null;
      echo 'Desconexión realizada con éxito!';
    }
}
?>