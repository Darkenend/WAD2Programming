<!DOCTYPE html>

<html>
<head>
    <title>Ordenación reversa</title>
</head>
<body>
<?php
$alumnos = array("Pepe", "Juan", "Marcelo", "Alberto", "Gerardo");
//ordenar de menor a mayor
rsort($alumnos);
foreach($alumnos as $clave => $valor)
    echo "alumnos[" . $clave . "]=" . $valor . "<br>";

?>
</body>
</html>
