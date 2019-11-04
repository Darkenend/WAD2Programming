<!DOCTYPE html>

<html>
<head>
    <title>array_slice</title>
</head>
<body>
<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'array_slice extrae una parte de un array' . EOL();
echo 'array_slice($array, $offset[, $length = NULL[, $preserve_keys = false]])' . EOL();

$entrada = array("Miguel", "Pepe", "Juan", "Julio", "Pablo");
echo '$entrada: '; var_dump($entrada); echo EOL();
//Modifico el tamaño
echo '$salida = array_slice($entrada, 0, 3)' . EOL();
$salida = array_slice($entrada, 0, 3);
//Muestro el array
echo '$salida: ' . EOL();
foreach($salida as $valor) echo "$valor" . " ";
echo EOL();
//Modifico de nuevo
echo '$salida = array_slice($salida, 1)' . EOL();
$salida = array_slice($salida, 1);
//Muestro el array
echo '$salida: ' . EOL();
foreach ($salida as $valor) echo "$valor" . " ";
echo EOL();
?>
</body>
</html>
