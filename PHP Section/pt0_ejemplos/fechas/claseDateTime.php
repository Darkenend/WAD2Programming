<!DOCTYPE html>
<html>
<head>
	<title>Clase DateTime</title>
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

//El constructor por defecto devuelve la fecha y hora actuales
echo '$date con el constructor por defecto ... new DateTime()';
echo '<br>';
$date = new DateTime();
print_r($date);
echo '<br>';

//Constructor con parámetro string
echo '$date con el constructor ... new DateTime(\'2015, May 12\')';
echo '<br>';
$date = new DateTime('2015, May 12');
print_r($date);
echo '<br>';

//y ... en Español?
echo '$date con el constructor ... new DateTime(\'12-mayo-2015\')';
echo '<br>';
$date = new DateTime('12-mayo-2015');
print_r($date);
echo '<br>';

//y ... formato con guiones Inglés
echo '$date con el constructor ... new DateTime(\'2015-06-19\')';
echo '<br>';
$date = new DateTime('2015-06-19');
print_r($date);
echo '<br>';

//y .. ahora que pilla?
echo '$date con el constructor ... new DateTime(\'02-02-12\')';
echo '<br>';
$date = new DateTime('02-02-12');
print_r($date);
echo '<br>';

//Con número de días
echo '$date con el constructor ... new DateTime(\'+10 days\')';
echo '<br>';
$date = new DateTime('+10 days');
print_r($date);
echo '<br>';

//Con número de días en español
echo '$date con el constructor ... new DateTime(\'+10 dias\')';
echo '<br>';
$date = new DateTime('+10 dias');
print_r($date);
echo '<br>';

//Con yesterday
echo '$date con el constructor ... new DateTime(\'Yesterday\')';
echo '<br>';
$date = new DateTime('Yesterday');
print_r($date);
echo '<br>';

//Con ayer
echo '$date con el constructor ... new DateTime(\'Ayer\')';
echo '<br>';
echo 'PETA!!!!!!!';
echo '<br>';
echo 'Si observamos pasan cosas raras cuando intentamos trabajar en español ...';
echo '<br>';
echo 'COROLARIO: introducir fechas en Inglés';
echo '<br>';

//Otra opción DateTime::createFromFormat()
echo '$date con el método estático createFromFormat(\'d-M-y\', \'02-Jan-15\')';
echo '<br>';
$date = DateTime::createFromFormat('d-M-y', '02-Jan-15');
print_r($date);
echo '<br>';


//Una vez tenemos una fecha se puede trabajar con ella
echo 'La última fecha: ' . strftime("%d/%m/%Y", $date->getTimeStamp());
echo '<br>';
//Se puede cambiar
$date->setDate(2015, 10, 10);
echo 'La última fecha: ' . strftime("%d/%m/%Y", $date->getTimeStamp());
echo '<br>';
//Se puede modificar
$date->modify('Tomorrow');
echo 'Día siguiente última fecha: ' . strftime("%d/%m/%Y", $date->getTimeStamp());
echo '<br>';
$date->setTimeStamp(0);
echo 'Dia 0 Unix: ' . strftime("%d/%m/%Y:%H:%M:%S", $date->getTimeStamp());
echo '<br>';

$maria = new DateTime('1985-4-5');
$carlos = new DateTime('1982-08-15');
if ($maria > $carlos) {
	echo 'María es más joven que Carlos';
} else {
	echo 'María es más mayor que Carlos';
}


?>

</body>
</html>
