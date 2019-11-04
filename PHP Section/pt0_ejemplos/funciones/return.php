<!DOCTYPE html>
<html>
<head>
	<title>Sentencia return</title>
</head>

<body>

<?php
function division($valor1, $valor2) {
	if ($valor2 == 0) 
		return 'No se puede dividir por cero!';
	
	return $valor1 / $valor2;
	
}
echo '<br>' . division(1,0);
echo '<br>' . division(0,1);
echo '<br>' . division(1, "0");
echo '<br>' . division(1, 0.0);
echo '<br>' . division(2, "0.0");
echo '<br>' . division("manzanas", "peras");
?>

</body>
</html>
