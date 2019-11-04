<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>array_replace</title>
</head>

<body>

<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'array_replace reemplaza los elementos del array original con elementos de array adicionales' . EOL();
echo 'array_replace($array1, array2[, array3 ...])' . EOL();
echo 'Si la clave del primer array existe en el segundo, su valor se reemplaza por el valor del segundo ...' . EOL();
echo 'Si la clave existe en el segundo array y no en el primero, se crea en el primero' . EOL();
echo 'Si se proporcionan varios arrays para reemplazo, se procede en orden, los arrays posteriores sobreescriben los valores anteriores' . EOL();

$base = array("naranja", "plátano", "manzana", "frambuesa");
var_dump($base); echo EOL();
$reemplazos = array(0=>"piña", 4=>"cereza");
var_dump($reemplazos); echo EOL();
$reemplazos2 = array(0=>"uva");
var_dump($reemplazos2); echo EOL();

echo '$cesta = array_replace($base, $reemplazos, $reemplazos2)' . EOL();
$cesta = array_replace($base, $reemplazos, $reemplazos2);
var_dump($cesta); echo EOL();
?>

</body>
</html>
