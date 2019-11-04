<!DOCTYPE html>
<html>
<head>
	<title>tipos numéricos</title>
</head>

<body>

<?php
echo 'Tamaño de un entero en mi plataforma: ' . PHP_INT_SIZE . '<br>';
echo 'Entero mínimo en mi plataforma: ' . PHP_INT_MIN. '<br>';
echo 'Entero máximo en mi plataforma: ' .PHP_INT_MAX . '<br>';
$a = 0b100; //binario
echo '0b100: ' . $a . '<br>';
$a = 0100; //octal
echo '0100: ' . $a . '<br>';
$a = 0x100; //hex
echo '0x100: ' . $a . '<br>';
$a = 3/2;
echo '3/2: ' . $a . '<br>';
$b = 7.5;
$a = (int)$b; //casting a int
echo '(int)7.5: ' . $a . '<br>';
$b = 7e2;
echo '7e2: ' . $b . '<br>';
?>

</body>
</html>
