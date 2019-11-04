<!DOCTYPE html>
<html>
<head>
	<title>Página destino</title>
</head>

<body>

<?php
//Mediante $_GET
echo 'Variable $saludo: ' . $_GET["saludo"] . '<br>' . "\n";
echo 'Variable $texto: ' . $_GET["texto"] . '<br>' . "\n";
echo '<hr>';
//Mediante HTTP_GET_VARS --> obsoleto y está deshabilitado en php.ini
echo 'Variable $saludo: ' . $HTTP_GET_VARS["saludo"] . '<br>' . "\n";
echo 'Variable $texto: ' . $HTTP_GET_VARS["texto"] . '<br>' . "\n";

?>

</body>
</html>
