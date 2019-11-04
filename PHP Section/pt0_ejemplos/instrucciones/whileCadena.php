<!DOCTYPE html>

<html>
<head>
    <title>While cadena</title>
</head>
<body>
<?php
$cadena = "Hola a todo el mundo";

//Quiero averiguar si hay una m y su posición
$i = 0;
while ($i < strlen($cadena) && $cadena[$i] != "m") 
    $i++;

if ($i == strlen($cadena))
    echo 'No se encuentra ...';
else
    echo "Está en la posición $i";
?>
</body>
</html>
