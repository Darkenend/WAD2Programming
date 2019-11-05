<?php
$cadenaConexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'admin.empresa';
$clave = '123_admin.empresa_321';
try {
    $bd = new PDO($cadenaConexion, $usuario, $clave);
    echo 'Conexión realizada con éxito<br>';
    //comenzar la transacción
    $bd->beginTransaction();
    $ins = "insert into usuarios(nombre, clave, rol) values('Fernando', '33333', 1)";
    $resul = $bd->query($ins);
    //se repite la consulta
    //falla porque el nombre es unique
    $resul = $bd->query($ins);
    if (!$resul){
        echo 'Error: ' . print_r($bd->errorInfo());
        //deshace el primer cambio
        $bd->rollBack();
        echo '<br>Transacción anulada<br>';
    } else {
        //si hubiera ido bien ...
        $bd->commit();
    }
} catch (PDOException $e) {
    echo 'Error en la base de datos: ' . $e->getMessage(); 
} finally {
    if (isset($bd)) $bd = null;
}
?>