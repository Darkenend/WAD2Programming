<!DOCTYPE html>

<html>
<head>
    <title>Bucle foreach</title>
</head>
<body>
<?php
$moneda = array(
    "España" => "Euro",
    "China" => "Yeng",
    "EEUU" => "Dolar"
);
foreach ($moneda as $clave=>$valor) {
     echo "Pais: $clave Moneda: $valor<br>";
}
?>
</body>
</html>
