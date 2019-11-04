<!DOCTYPE html>
<html>
<head>
	<title>calculator</title>
</head>

<body>

<?php
function calculator($operacion, $numa, $numb) {
	$resul = $operacion($numa, $numb);
	return $resul;
}
function sumar($a, $b) {return $a + $b;}
function multiplicar($a, $b) {return $a * $b;}

$a = 4;$b = 5;
$r1 = calculator("multiplicar", $a, $b);
echo "$r1 <br>";
$r2 = calculator("sumar", $a, $b);
echo "$r2 <br>";
?>

</body>
</html>
