<!DOCTYPE html>

<html>
<head>
    <title>array_merge</title>
</head>
<body>
<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'Combina 2 o más arrays de modo que los valores de uno se anexan al final del anterior.' . EOL();
echo 'array_merge($arr1[, $arr2 ...])' . EOL();
$tabla = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
var_dump($tabla);
echo EOL();
$tabla2 = array("12", "34", "45", "52", "12");
var_dump($tabla2);
echo EOL();
$tabla3 = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");
var_dump($tabla3);
echo EOL();
//aumentamos el tamaño del array
$resultado = array_merge($tabla, $tabla2, $tabla3);
echo '$resultado: ' . EOL();
foreach ($resultado as $valor) echo $valor . EOL();
?>
</body>
</html>
