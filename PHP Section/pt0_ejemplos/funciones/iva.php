<!DOCTYPE html>
<html>
<head>
	<title>Función IVA</title>
</head>

<body>

<?php
function iva($base, $porcentaje = 21) {
	return $base * $porcentaje / 100;
}

echo iva(1000) . '<br>';
echo iva(1000, 7) . '<br>';
echo iva(10, 0) . '<br>';
?>

</body>
</html>
