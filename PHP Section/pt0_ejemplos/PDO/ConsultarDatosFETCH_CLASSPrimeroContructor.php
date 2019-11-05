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
    
    //FETCH_CLASS primero llamar constructor ANTES de asignar los datos
    //crear la clase Clientes
    class Clientes {
      public $nombre;
      public $ciudad;
      public $otros;
      public function __construct($otros = '') {
        $this->nombre = strtoupper($this->nombre);
        $this->ciudad = mb_substr($this->ciudad, 0, 3);
        $this->otros = $otros;
      }  
        //métodos ...
    }
  
    $stmt = $bd->prepare("select * from Clientes");
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Clientes');
    $stmt->execute();

    //ahora los datos salen sin modificar
    while ($objeto = $stmt->fetch()) {
      echo $objeto->nombre . " -> ";
      echo $objeto->ciudad . "<br>";
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