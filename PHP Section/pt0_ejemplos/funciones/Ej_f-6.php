<?php
/*
 * Crea una función que pasándoloe la longitud de los lados del triángulo
 * indique si es escaleno, isósceles o equilátero
 */
require_once 'libreriaEjFunciones.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 6</title>
</head>

<body>

<?php
echo triangulo(1.0, 1.0, 1.0) . EOL();
echo triangulo(1.0, 1.0, 0.5) . EOL();
echo triangulo(.5, 1.0, 1.25) . EOL();
echo triangulo(.5, 1.0, 1.5) . EOL();
?>

</body>
</html>
