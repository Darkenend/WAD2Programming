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
    
    //FETCH_BOUND
    $stmt = $bd->prepare('select nombre, ciudad from Clientes');
    //Especificar FETCH MODE antes de llamar a fetch
    //$stmt->setFetchMode(PDO::FETCH_BOUND);

    //Ejecutamos
    $stmt->execute();

    //Con FETCH_BOUND se debe usar el método bindColumn
    $stmt->bindColumn(1, $nombre); //por número de columna (SQL siempre comienza por 1)
    $stmt->bindColumn('ciudad', $ciudad); //o asociativamente
    
    //Mostramos resultados.
    //cuando se llama a fetch también se puede indicar el FETCH_MODE
    while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
        $cliente = $nombre . ": " . $ciudad;
        echo $cliente . "<br>";
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