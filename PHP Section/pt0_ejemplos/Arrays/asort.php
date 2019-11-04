<!DOCTYPE html>

<html>
<head>
    <title>Ordenación por valor manteniendo claves</title>
</head>
<body>
<?php
//ordenar manteniendo los índices
$capitales = array(
    "España" => "Madrid",
    "Argentina" => "Buenos Aires",
    "México" => "Ciudad de México",
    "Brasil" => "Brasilia"
);
echo "original:" . "<br/>\n";
print_r($capitales);

echo "<br/>\n" . "asort:" . "<br/>\n";
asort($capitales);
foreach($capitales as $clave => $valor)
    echo $clave . " = " . $valor . "<br>";
?>
</body>
</html>
