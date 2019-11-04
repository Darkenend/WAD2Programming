<?php
/*
 * Crea un documento que conste de un título h1 con el texto "Calendario".
 * En la página deberá mostrarse el día, mes y año actuales (en el momento
 * de ejecutar el ejercicio) y para cada día del mes, indicar si es lunes, martes, ...
 * 
 */
//Helper
function EOL() {return PHP_EOL . '<br>';}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio</title>
</head>

<body>
<h1>Calendario</h1>

<?php
//primero ajustamos la zona horaria
if (date_default_timezone_get() !== 'Europe/Madrid') {
	date_default_timezone_set('Europe/Madrid');
}
//Ponemos formato local para fechas
//Para ver locales instalados en el terminal: locale -a
setlocale(LC_ALL, "es_ES.utf8");

$date = new DateTime();
$fecha = strftime("La fecha actual es: %d-%m-%Y", $date->getTimeStamp());
echo $fecha . EOL();

//Me sirve para luego
$fecha2 = strftime("%d-%m-%Y", $date->getTimestamp());

// Genero un intervalo de 1 día
$intervalo = new DateInterval('P1D');
// Como %d va de 01-31 puedo cambiar el string al día 01-....
$fechaPrincipioMes = '01' . substr($fecha2, 2);
echo 'Fecha primer día mes: ' . $fechaPrincipioMes . EOL();
$dateFirstDay = DateTime::createFromFormat("d-m-Y", $fechaPrincipioMes);
// Obtengo una fecha con 31 días más (no sé los días del mes pero me dá igual ...) 
$fechaFinalMes = strftime("%d-%m-%Y", $dateFirstDay->getTimestamp() + 31*24*60*60);
echo 'Fecha último día mes (*): ' . $fechaFinalMes . EOL();
$dateLastDay = DateTime::createFromFormat("d-m-Y", $fechaFinalMes);
echo EOL();

// Ya tengo fecha inicial, el intervalo y la fecha final ...
// Itero el periodo vigilando que no se cambie de mes
$periodo = new DatePeriod($dateFirstDay, $intervalo, $dateLastDay);

// Mes del primer día
$mesPrimerDia = strftime("%m", $dateFirstDay->getTimestamp());
foreach ($periodo as $dia) {
	$mesDiaIteracion = strftime("%m", $dia->getTimestamp());
	if (strcmp($mesPrimerDia, $mesDiaIteracion) === 0) {
		echo strftime("Dia %d --> %A", $dia->getTimestamp()) . EOL();
		// echo $dia->format('d-m-Y --> D') . EOL(); //Con este no lo saca en Español
	}
}

?>

</body>
</html>
