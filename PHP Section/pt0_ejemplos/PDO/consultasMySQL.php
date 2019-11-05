<?php
$cadenaConexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'admin.empresa';
$clave = '123_admin.empresa_321';
try {
    $bd = new PDO($cadenaConexion, $usuario, $clave);
    echo 'Conexión realizada con éxito<br>';
    $sql = 'select nombre, clave, rol from usuarios';
    $usuarios = $bd->query($sql);
    echo 'Número de usuarios: ' . $usuarios->rowCount() . '<br>';
    foreach ($usuarios as $usu) {
        print 'Nombre: ' . $usu['nombre'];
        print ' Clave: ' . $usu['clave'] . '<br>';
    }
    /*
     * consulta preparada, parámetros por orden
     */
    $preparada = $bd->prepare("select nombre from usuarios where rol = ?");
    $preparada->execute(array(0));
    echo 'Usuarios con rol 0: ' . $preparada->rowCount() . '<br>';
    foreach ($preparada as $usu) {
        print 'Nombre: ' . $usu['nombre'] . '<br>';
    }
    /*
     * Consulta preparada, parámetros por nombre
     */
    $preparadaNombre = $bd->prepare("select nombre from usuarios where rol = :rol");
    $preparadaNombre->execute(array(':rol' => 0));
    echo 'Usuarios con rol 0: ' . $preparadaNombre->rowCount() . '<br>';
    foreach ($preparadaNombre as $usu) {
        print 'Nombre: ' . $usu['nombre'] . '<br>';
    }
    $bd = null; //cierre conexión
} catch (PDOException $e) {
    echo 'Error en la base de datos: ' . $e->getMessage(); 
}
?>