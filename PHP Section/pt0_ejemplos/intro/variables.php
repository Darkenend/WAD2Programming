<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo tipos de variables PHP 7</title>
</head>
<body>
<?php
echo "Nombres de variables:" . "<br>";
echo "Comienzan por $" . "<br>";
echo "Al $ no puede seguir ni espacio ni numero" . "<br>";
echo "Los guiones bajos son permitidos tras el $" . "<br>";
echo "Los espacios en blanco no están permitidos" . "<br>";
echo "Son sensibles a mayúsculas y minúsculas" . "<br>";

$a = 1;
$b = "3.34";
$c = "Contenedor de código PHP 7.";
echo $a . "<br>". $b . "<br>" . $c . '<br>';
echo '$a = ' . $a . '<br>';
echo '$b = ' . $b . ' (cadena)' . '<br>';
echo '$a + $b =' . ($a + $b) . '<br>';
echo '$a . $b =' . $a . $b . '<br>';
?>
</body>
</html>