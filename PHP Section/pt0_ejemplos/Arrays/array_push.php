<!DOCTYPE html>

<html>
<head>
    <title>array_push/array_pop</title>
</head>
<body>
<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'array_push inserta uno o más elementos al final del array.' . EOL();
echo 'el array se pasa por referencia -> queda modificado!' . EOL();
$tabla = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
var_dump($tabla);
echo EOL();
//aumentamos el tamaño del array
echo 'array_push($tabla, "Gorrión", "Paloma", "Oso")' . EOL();
array_push($tabla, "Gorrión", "Paloma", "Oso");

foreach($tabla as $valor) echo $valor . EOL();

echo 'array_pop extrae y devuelve el último elemento del final del array' . EOL();
echo 'el array se pasa por referencia -> queda modificado' . EOL();

echo '$ultimo = array_pop($tabla)' . EOL();
//disminuimos el tamaño del array
$ultimo = array_pop($tabla);
echo "elemento $ultimo extraido" . EOL();
echo 'Ahora $tabla es: ' . EOL();
foreach($tabla as $valor) echo $valor . EOL();
?>
</body>
</html>
