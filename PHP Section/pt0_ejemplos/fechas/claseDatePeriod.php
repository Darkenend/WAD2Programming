<!DOCTYPE html>
<html>
<head>
	<title>Clase DatePeriod</title>
</head>

<body>

<?php
//lo primero ...
//primero ajustamos la zona horaria
if (date_default_timezone_get() !== 'Europe/Madrid') {
	date_default_timezone_set('Europe/Madrid');
}
//Ponemos formato local para fechas
//Para ver locales instalados en el terminal: locale -a
setlocale(LC_ALL, "es_ES.utf8", "es_ES", "spanish", "esp_esp");


//Permite iterar sobre fechas (inicio -> fin) incrementado un intervalo
//Se le pasa fecha de inicio (DateTime), un intervalo (DateInterval) y fecha de fin (DateTIme)
//fecha de inicio
$maria = new DateTime('1985-4-5');
//intervalo de 1 año
$intervalo = new DateInterval('P1Y');
//La fecha de fin es la actual
$periodo = new DatePeriod($maria, $intervalo, new DateTime());

//Veamos el día de la semana que cumplió años en cada año hasta hoy
foreach($periodo as $fecha) {
	echo $fecha->format("Y-m-d -> D") . '<br>'; //Con este -> no funciona setlocale!
	echo strftime("%Y-%m-%d -> %a", $fecha->getTimeStamp()) . '<br>';
}

//Otro ejemplo, nos saltamos el primer dato
$carlos = new DateTime('1982-08-15');
$intervalo = new DateInterval('P1Y');
$periodo = new DatePeriod($carlos, $intervalo, new DateTime(), DatePeriod::EXCLUDE_START_DATE);
echo iterator_count($periodo);

?>

</body>
</html>
