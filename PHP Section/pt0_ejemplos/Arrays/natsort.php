<!DOCTYPE html>

<html>
<head>
    <title>Ordenación natural</title>
</head>
<body>
<?php
$productos = array("producto 11", "producto 1", "producto 12", "producto 2");
natsort($productos);
//sort($productos);
foreach($productos as $clave => $valor)
    echo $clave . " = " . $valor . "<br>";
?>
</body>
</html>
