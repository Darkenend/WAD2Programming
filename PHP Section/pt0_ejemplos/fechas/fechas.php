<!DOCTYPE html>

<html>
<head>
    <title>Formatos fechas</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$fechaMysql = "2015-08-24";
//PROCEDIMENTAL
$objetoDateTime = date_create_from_format('Y-m-d', $fechaMysql);
//cambiar formato
$nuevoFormato = date_format($objetoDateTime, "d/m/Y");
echo 'Español ' . $nuevoFormato . '<br>';
//fecha a partir instante actual
$objetoFechaActual = date_create();
$cadenaFechaActual = date_format($objetoFechaActual, 'y-m-d');
$cadenaFechaHoraActual = date_format($objetoFechaActual, 'y-m-d (H:i:s)');
echo 'Fecha actual formato MySQL ' . $cadenaFechaActual . '<br>';
echo 'Fecha y hora actual ' . $cadenaFechaHoraActual . '<br>';


//OOP
$objetoDateTime2 = DateTime::createFromFormat('Y-m-d', $fechaMysql);
//cambiar formato
$nuevoFormato2 = $objetoDateTime2->format("d/m/Y");
echo 'Español ' . $nuevoFormato2 . '<br>';
//fecha a partir del instante actual
$objetoFechaActual2 = new DateTime();
$cadenaFechaActual2 = $objetoFechaActual2->format("d/m/Y");
echo 'Fecha actual en Español ' . $cadenaFechaActual2 . '<br>';
?>
</body>
</html>
