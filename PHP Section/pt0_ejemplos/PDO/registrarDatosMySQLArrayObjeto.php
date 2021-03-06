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
    
    //Clase Clientes
    class Clientes {
      public $nombre;
      public $ciudad;
      public function __construct($nombre, $ciudad) {
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
      }
      //Métodos ...
    }

    $cliente = new Clientes("Jennifer", "Málaga");

    //PREPARE -> BIND + EXECUTE
    //Prepare
    $stmt = $bd->prepare("insert into Clientes(nombre, ciudad) values(:nombre, :ciudad)");

    //Bind + Execute
    if ($stmt->execute((array)$cliente)) {
      echo 'Se ha creado el nuevo registro!<br>';  
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