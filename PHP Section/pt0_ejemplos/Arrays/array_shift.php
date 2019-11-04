<!DOCTYPE html>

<html>
<head>
    <title>Función array_shift</title>
</head>
<body>
<?php
$entrada = array("Miguel", "Pepe", "Juan", "Julio", "Pablo");
//Quito primera casilla
$salida = array_shift($entrada);
echo "La función devuelve: " . $salida . "<br>";
//Muestro el array
foreach ($entrada as $valor) echo "$valor" . " ";
echo "<br>";
//Quito primera casilla
$salida = array_shift($entrada);
echo "La función devuelve: " . $salida . "<br>";
//Muestro el array
foreach ($entrada as $valor) echo "$valor" . " ";
echo "<br>";
?>
</body>
</html>
