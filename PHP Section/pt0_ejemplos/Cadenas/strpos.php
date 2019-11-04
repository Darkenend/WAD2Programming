<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
<head>
	<title>strpos y otros</title>
</head>

<body>

<?php
$haystack = "Estoy buscando la palabra pepita dentro de este string";
$neddle = "pepita";
$offset = 27;
echo 'SRTPOS()' . '<br/>' . '<hr>';

$posicion = strpos($haystack, $neddle);
if ($posicion === false)
	echo 'La palabra' . $neddle . ' no se ha encontrado';
else
	echo 'La palabra ' . $neddle . ' se encuentra en la posición ' . $posicion;
echo '<br/>';

//Con offset
$posicion = strpos($haystack, $neddle, $offset);
if ($posicion === false)
	echo 'La palabra ' . $neddle . ' no se ha encontrado';
else
	echo 'La palabra ' . $neddle . ' se encuentra en la posición ' . $posicion;
echo '<br/>';

echo 'SRTRPOS()' . '<br/>' . '<hr>';

$haystack = 'ababcd';
$neddle = 'ab';
$posicion = strrpos($haystack, $neddle);
if ($posicion === false) 
	echo "Perdón, no se encuentra $neddle en $haystack";
else
	echo "La palabra $neddle se encuentra en $haystack en la posición $posicion";
?>

</body>
</html>
