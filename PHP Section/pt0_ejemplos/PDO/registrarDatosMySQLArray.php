<?php
$dsn = 'mysql:dbname=pdo_clientes;host=127.0.0.1';
$usuario = 'admin.pdo_clientes';
$clave = '123_admin.pdo_clientes_321';
$options = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
try {
    $dbh = new PDO($dsn, $usuario, $clave, $options);
    echo 'Conexión realizada con éxito<br>';
    
    //PREPARE -> BIND + EXECUTE
    //Prepare
    $stmt = $dbh->prepare("insert into Clientes(nombre, ciudad) values(:nombre, :ciudad)");

    $nombre = "Luis";
    $ciudad = "Barcelona";

    //Bind + Execute
    if ($stmt->execute(array(':nombre'=>$nombre, ':ciudad'=>$ciudad))) {
        echo 'Se ha creado el nuevo registro!<br>';  
    }

    $nombre = "Pepa";
    $ciudad = "Valencia";

    //Bind + Execute
    if ($stmt->execute(array(':nombre'=>$nombre, ':ciudad'=>$ciudad))) {
        echo 'Se ha creado el nuevo registro!<br>';
    }
    
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage() . '<br>';
} finally {
    if (isset($dbh)) {
        $dbh = null;
        echo 'Desconexión realizada con éxito!';
    }
}

?>