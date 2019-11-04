<!DOCTYPE html>
<html>
<head>
	<title>Parámetros por valor</title>
</head>

<body>

<?php
function porValor($paramtro1) {
	$parametro1 = "Hola";
	echo '<br>' . $parametro1;
}

$miVariable = "esto no cambia";
porValor($miVariable);
echo '<br>' . $miVariable;
?>

</body>
</html>
