<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
        Ejercicio 1
    </title>
</head>
<body>
<?php


if (!isset($_GET['nombre'])) {
    $nombre = "//Álvaro////";
} else {
    $nombre = $_GET['nombre'];
}
$nombre = trim($nombre, "/");
echo strtoupper($nombre)."<br>";
echo strtolower($nombre)."<br>";
echo strlen($nombre);
?>
</body>
</html>
