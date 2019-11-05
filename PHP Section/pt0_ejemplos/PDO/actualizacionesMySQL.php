<?php
$cadenaConexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'admin.empresa';
$clave = '123_admin.empresa_321';
try {
    $bd = new PDO($cadenaConexion, $usuario, $clave);
    echo 'Conexión realizada con éxito<br>';
    //insertar nuevo usuario
    $ins = "insert into usuarios(nombre, clave, rol) values('Alberto', '33333', 1)";
    $resul = $bd->query($ins);
    //comprobar errores
    if ($resul) {
        echo 'insert correcto<br>';
        echo 'Filas insertadas: ' . $resul->rowCount() . '<br>';
    } else {
        print_r($bd->errorInfo());
        echo '<br>';
    }
    //para los autoincrementos
    echo 'Código de la fila insertada ' . $bd->lastInsertId() . '<br>';
    //actualizar
    $upd = "update usuarios set rol = 0 where rol = 1";
    $resul = $bd->query($upd);
    //comprobar errores
    if ($resul) {
        echo 'update correcto<br>';
        echo 'Filas actualizadas: ' . $resul->rowCount() . '<br>';
    } else {
        print_r($bd->errorInfo());
        echo '<br>';
    }
    //borrar
    $del = 'delete from usuarios where nombre = "Luisa"';
    $resul = $bd->query($del);
    //comprobar errores
    if ($resul) {
        echo 'delete correcto<br>';
        echo 'Filas borradas: ' . $resul->rowCount() . '<br>';
    } else {
        print_r($bd->errorInfo());
        echo '<br>';
    }
} catch (PDOException $e) {
    echo 'Error en la base de datos: ' . $e->getMessage(); 
} finally {
    if (isset($bd)) $bd = null; //desconectar
}
?>