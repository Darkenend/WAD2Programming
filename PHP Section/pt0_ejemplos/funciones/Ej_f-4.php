<?php
/*
 * Crea una función para calcular potencias de un número
 * El primer parámetro ha de ser int (base)
 * El segundo (exponente) ha de ser int, por defecto vale 2
 * La función ha de mostrar por pantalla el número el exponente y el resultado
 */
require_once 'libreriaEjFunciones.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 4</title>
</head>

<body>

<?php
$base = 2;
potencia($base);
$exponente = 3;
potencia($base, $exponente);
potencia(0.25);
potencia(5,-5);
potencia('a');
?>

</body>
</html>
