<!DOCTYPE html>
<html>
<head>
	<title>array_search</title>
</head>

<body>

<?php
function EOL() {return PHP_EOL . '<br>';}

echo 'Busca un valor determinado en un array y devuelve la clave en caso de éxito.' . EOL();
echo 'Devuelve FALSE en caso contrario.' . EOL();
echo 'Es sensible a mayúsculas y minúsculas' . EOL();
echo 'array_search($neddle, $haystack[, $strict]);' . EOL();
echo 'Si strict es TRUE comprueba si son idénticos (tipo)' . EOL();

$haystack = ['avión', 'bicicleta', 'motocicleta', 'tren', 'coche', 'autobús', ' metro'];
$neddle = 'tren';
var_dump($haystack);
echo EOL();
$found = array_search($neddle, $haystack, true);
if ($found === false) {
	echo "Elemento $neddle no encontrado" . EOL();
} else {
	echo "Elemento $neddle en posición $found" . EOL();
}
$neddle = 'pie';
$found = array_search($neddle, $haystack, true);
if ($found === false) {
	echo "Elemento $neddle no encontrado" . EOL();
} else {
	echo "Elemento $neddle en posición $found" . EOL();
}
?>

</body>
</html>
