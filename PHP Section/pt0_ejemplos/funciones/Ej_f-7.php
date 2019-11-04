<?php
/*
 * Función que calcula el IVA con 2 parámetros: el primero la base imponible
 * y el segundo el porcentaje a aplicar (opcional, por defecto 18%).
 * Llama la función con los valores: 1000, 1000 + 8%, 10 + 0%
 * y muestra los respectivos resultados
 */
require_once 'libreriaEjFunciones.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 7</title>
</head>

<body>

<?php
echo iva(1000) . EOL();
echo iva(1000, 8) . EOL();
echo iva(10, 0) . EOL();
?>

</body>
</html>
