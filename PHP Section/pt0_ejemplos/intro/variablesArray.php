<!DOCTYPE html>

<html>
<head>
    <title>Ejemplo de tipos de variables en PHP 7</title>
</head>
<body>
<?php
//declaración como matriz
$miArray = array();

for ($i = 0; $i < 4; $i++){
    $miArray[$i] = "Posición " . $i;
}

//mostrar
echo "<pre>"; //HTML - sin formato
print_r($miArray); //human readable
echo "</pre>";
?>
</body>
</html>
