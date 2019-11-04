<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
<head>
	<title>funciones anónimas</title>
</head>

<body>

<?php
//Sin parámetros
$anonima = function(){echo "Hola";};
$anonima();
echo '<br>';
//Con parámetros
$anonima2 = function($nombre) {echo 'Hola ' . $nombre;};
$anonima2('Álex');
echo '<br>';
//Utilizando variables de ámbito superior
function saluda(callable $fnSaluda) {
	$fnSaluda('Pepe');
}
$saludo = 'Hola';
$anonima3 = function($nombre) use ($saludo) {
	echo "$saludo $nombre";
};
saluda($anonima3);
?>

</body>
</html>
