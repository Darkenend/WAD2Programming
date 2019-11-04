<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>array_rand</title>
</head>
<body>
<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'array_rand($array[, $num = 1])' . EOL();
echo 'Selecciona una o más entradas aleatorias de un array' . EOL();
echo 'Devuelve la clave o claves de los valores seleccionados' . EOL();
echo 'Usa un generador de números pseudoaleatorios -> no apto para fines criptográficos' . EOL();
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
var_dump($array);
echo EOL();
echo '$index = array_rand($array)' . EOL();
$index = array_rand($array);
echo "El índice vale $index" . EOL();
echo "El valor seleccionado es " . $array[$index] . EOL();

?>
</body>
</html>
