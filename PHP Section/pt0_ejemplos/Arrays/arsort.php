<!DOCTYPE html>

<html>
<head>
    <title>Ordenación por valor manteniendo claves</title>
</head>
<body>
<?php
//ordenar manteniendo los índices. Reverso
$ciudades = array("Madrid", "Barcelona", "Valencia", "Sevilla", "Bilbao");
echo 'Original ...' . PHP_EOL . '<br>';
print_r($ciudades);
echo PHP_EOL . '<br>';

arsort($ciudades);
echo 'arsort ...' . PHP_EOL . '<br>';
foreach($ciudades as $clave => $valor)
    echo $clave . " = " . $valor . "<br>";
?>
</body>
</html>
