<!DOCTYPE html>
<html>
<head>
	<title>Salida con printf</title>
</head>

<body>

<?php
$ciclo = "DAW";
$modulo = "DWES";
print "<p>";
printf("%s es un módulo de %d curso de %s", $modulo, 2, $ciclo);
print "</p>" . PHP_EOL;
print "<p>";
printf("%s es un módulo de %+04d curso de %s", $modulo, 2, $ciclo);
print "</p>" . PHP_EOL;
print "<p>";
printf("%s es un módulo de %03b (binario) curso de %s", $modulo, 2, $ciclo);
print "</p>" . PHP_EOL;
print "<p>";
printf("%-10s es un módulo de %d curso de %s", $modulo, 2, $ciclo);
print "</p>" . PHP_EOL;;
print "<pre>";
printf("%-10s es un módulo de %d curso de %s", $modulo, 2, $ciclo);
print "</pre>" . PHP_EOL;;

print "<p>";
printf("El número PI vale %+.2f", 3.1416);
print "</p>" . PHP_EOL;;
print "<p>";
$txtPI = sprintf("El número PI vale %+.2f", 3.1416);
echo $txtPI;
print "</p>" . PHP_EOL;;
?>

</body>
</html>
