<?php
/*
 * Realizar una función que incremente un número pasado por valor.
 * El número lo muestra la función por pantalla.
 * Tras ejecutar la función mostrar el número pasado como parámetro
 * Luego lo mismo por referencia
 */
require_once 'libreriaEjFunciones.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicios 2 y 3</title>
</head>

<body>

<?php
$num = 10;
incPorValor($num);
echo 'Programa principal: ' . $num . EOL();
incPorReferencia($num);
echo 'Programa principal: ' . $num . EOL();
?>

</body>
</html>
