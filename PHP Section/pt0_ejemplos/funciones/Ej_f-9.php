<?php
/*
 * Muestra el siguiente texto por pantalla utilizando la función fecha().
 * a. Ejemplo 1: 08/09/19 14:11:38
 * b. Son las 14 : 11 : 39 y hoy es 8-9-2019
 */
require_once 'libreriaEjFunciones.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 9</title>
</head>

<body>

<?php
echo 'Ejemplo 1: ' . fecha('FH') . EOL();
echo 'Son las ' . fecha('H'). ' y hoy es ' . fecha('F') . EOL();
?>

</body>
</html>
