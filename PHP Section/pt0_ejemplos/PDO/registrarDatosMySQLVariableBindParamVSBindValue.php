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
    
    //PREPARE -> BIND -> EXECUTE
    //Prepare
    $stmt = $bd->prepare("insert into Clientes(nombre) values(:nombre)");

    //Bind - param
    $nombre = "Morgan";

    $stmt->bindParam(':nombre', $nombre); //Se enlaza a la variable $nombre
    $nombre = "TeFurteLaCadira"; //Cambiamos el valor de $nombre ...
    //Execute
    $stmt->execute(); //Se inserta el último

    //Bind - value
    $nombre = "Anne2";

    $stmt->bindValue(':nombre', $nombre); //Se enlaza al valor "Anne2"
    $nombre = "NoTeFurteLaCadira"; //Cambiamos el valor de $nombre ...
    //Execute
    $stmt->execute(); //Se inserta el cliente "Anne2"    
    
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage(). '<br>';
} finally {
    if (isset($bd)) {
      $bd = null;
      echo 'Desconexión realizada con éxito!';
    } 
}
?>