<!DOCTYPE html>

<html>
<head>
    <title>Función unset</title>
</head>
<body>
<?php
$estadiosFutbol = array(
    "Barcelona" => "Nou Camp",
    "Real Madrid" => "Santiago Bernabeu",
    "Valencia" => "Mestalla",
    "Real Sociedad" => "Anoeta"
);

//Mostramos los estadios
foreach($estadiosFutbol as $clave => $valor)
    echo $clave . " -- " . $valor . "<br>";
echo "<p>";
//Eliminamos el estadio asociado al Real Madrid
unset($estadiosFutbol["Real Madrid"]);

//Mostramos estadios de futbol de nuevo
foreach($estadiosFutbol as $clave => $valor)
    echo $clave . " -- " . $valor . "<br>";
echo "</p>";

?>
</body>
</html>
