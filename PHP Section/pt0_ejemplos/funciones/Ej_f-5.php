<?php
/*
 * Crea 3 variables con diferentes números
 * Crea una función suma que sume el contenido de las dos primeras variables
 * y guarde el resultado en la tercera variable.
 * Muestra el resultado por pantalla
 */
require_once 'libreriaEjFunciones.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 5</title>
</head>

<body>

<?php
$n1 = 5;
$n2 = 78.14;
$res = 0;
suma($n1, $n2, $res);
echo $res . EOL();
?>

</body>
</html>
