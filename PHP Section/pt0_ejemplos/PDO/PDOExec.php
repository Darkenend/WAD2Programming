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
    
    // Si lo siguiente devuelve 1, es que se ha eliminado correctamente:
    echo 'número de registros borrados: ';
    echo $bd->exec("DELETE FROM Clientes WHERE nombre='Luis'") . '<br>';
    // No devuelve el número de filas con SELECT, devuelve 0
    echo 'resultado del select simepre 0: ';
    echo $bd->exec("SELECT * FROM Clientes") . '<br>';
    
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage() . '<br>';
} finally {
    if (isset($bd)) {
        $bd = null;
        echo 'Desconexión realizada con éxito!';
    }
}
?>