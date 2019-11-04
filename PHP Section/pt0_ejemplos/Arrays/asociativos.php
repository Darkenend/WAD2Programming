<!DOCTYPE html>

<html>
<head>
    <title>Arrays asociativos</title>
</head>
<body>
<?php
$moneda["españa"] = "Euro";
$moneda["francia"] = "Euro";
$moneda["usa"] = "Dolar";

echo 'La moneda de España es ' . $moneda["españa"] . '<br>'; 

//forma típica
$telefono = array(
    "pepe" => "12345689",
    "nacho" => "234567891",
    "paca" => "345678912"
);

echo 'El telefono de Paca es ' . $telefono["paca"] . '<br>';

?>
</body>
</html>
