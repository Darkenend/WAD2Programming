<!DOCTYPE html>
<html>
<head>
	<title>Parámetros por referencia</title>
</head>

<body>

<?php
function porReferencia(&$cadena) {
	$cadena = 'Si cambia';
}

$str = 'Esto es una cadena';
porReferencia($str);
echo $str;
?>

</body>
</html>
