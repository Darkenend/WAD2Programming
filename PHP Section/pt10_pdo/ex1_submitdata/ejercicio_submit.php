<?php
$dsn = "mysql:host=localhost;dbname=prueba";
$usuario = 'darkenend';
$clave = 'Twoseven3';
$options =  array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
try {
    $dbh = new PDO($dsn, $usuario, $clave, $options);
    echo 'Conexión realizada con éxito<br>';

    // PREPARE -> BIND -> EXECUTE
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $role = $_POST['role'];
    } else {
        $name = 'Name';
        $city = 'City';
        $role = '-1';
    }
    $statement = $dbh->prepare("INSERT INTO `clientes`(`cli_name`, `cli_city`, `cli_role`) VALUES (:cli_name, :cli_city, :cli_role)");
    $statement->bindParam(':cli_name', $name, PDO::PARAM_STR);
    $statement->bindParam(':cli_city', $city, PDO::PARAM_STR);
    $statement->bindParam(':cli_role', $role, PDO::PARAM_INT);
    $statement->execute();

} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
} finally {
    if (isset($dbh)) {
        $dbh = null;
        echo 'Conexión cerrada.';
    }
}