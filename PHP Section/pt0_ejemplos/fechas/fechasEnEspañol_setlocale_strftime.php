<!DOCTYPE html>
<html>
<head>
	<title>setlocale y strftime</title>
</head>

<body>

<?php
//primero ajustamos la zona horaria
if (date_default_timezone_get() !== 'Europe/Madrid') {
	date_default_timezone_set('Europe/Madrid');
}


echo 'Sin locale ...' . '<br>';
//setlocale(LC_ALL, "es_ES.utf8");
echo strftime("Hoy es %A día %d de %B");
echo '<br>';

//Ponemos formato local para fechas
//Para ver locales instalados en el terminal: locale -a
echo 'Con locale ...' . '<br>';
setlocale(LC_ALL, "es_ES.utf8");
echo strftime("Hoy es %A día %d de %B");
echo '<br>';
//otra fecha
$date = new DateTime("2014-6-7");
echo 'Otra fecha ...';
echo '<br>';
//Por defecto el segundo parámetro (opcional) es la hora Unix actual (segundos pasados desde 1/1/70) o time()
//Con el método getTimeStamp obtenemos la hora Unix de la que hemos creado
$fecha = strftime("La fecha es del año %y y su mes es %B", $date->getTimeStamp());
echo $fecha;
echo '<br>';
//Por último vamos a volcar $date
echo 'Volcado de $date:';
echo '<br>';
print_r($date);


?>

</body>
</html>
