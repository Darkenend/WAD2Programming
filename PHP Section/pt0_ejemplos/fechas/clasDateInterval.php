<!DOCTYPE html>
<html>
<head>
	<title>clase DateInterval</title>
</head>

<body>

<?php
//primero ajustamos la zona horaria
if (date_default_timezone_get() !== 'Europe/Madrid') {
	date_default_timezone_set('Europe/Madrid');
}
//Ponemos formato local para fechas
//Para ver locales instalados en el terminal: locale -a
setlocale(LC_ALL, "es_ES.utf8");

$maria = new DateTime('1985-4-5');
$carlos = new DateTime('1982-08-15');


//El método diff devuelve un objeto DateInterval
$diferencia = $maria->diff($carlos);
echo "Maria y Carlos se llevan $diferencia->y años y $diferencia->m meses de diferencia";
echo '<br>';
echo 'El objeto DateInterval:';
echo '<br>';
print_r($diferencia);
echo '<br>';

//También se puede especificar el formato a partir de un objeto DateInterval
echo $diferencia->format("María y Carlos se llevan %Y años y %m meses de diferencia");

//También podemos sumar un DateInterval a un DateTime
echo '<br>';
echo 'A Maria le sumamos su diferencia de edad con Carlos:';
echo '<br>';
$maria->add($diferencia); //Ahora tienen la misma edad
print_r($maria);
echo '<br>';
print_r($carlos);
echo '<br>';

//los objetos DateInterval pueden crearse desde cero (sin usar diff)
$intervalo = new DateInterval('P2M2D');
echo 'Intervalo creado desde cero ...';
echo '<br>';
print_r($intervalo);

?>

</body>
</html>
