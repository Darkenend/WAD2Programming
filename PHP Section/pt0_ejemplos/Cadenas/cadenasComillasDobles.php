<!DOCTYPE html>
<html>
<head>
	<title>Comillas dobles</title>
</head>

<body>

<?php
echo "Esto es una linea \n";
echo "Esto es una linea" . PHP_EOL; //más portable
echo "<br>";
echo "\tuno dos tres";
echo "<br>";
echo "\vuno dos" . "<br>";
echo "la barra invertida: \\" . "<br>";
echo "\n";
echo "El \$ y las \"" . PHP_EOL . "<br>";
$var = "Wonderfull";
echo "This is $var" . PHP_EOL . "<br>";
echo "This is \$var" . PHP_EOL . "<br>";
echo "This is $vars" . PHP_EOL . "<br>"; //error
echo "Those are {$var}s: BAD ENGLISH" . PHP_EOL . "<br>";
echo "Caracter en octal: " . "\377" . PHP_EOL . "<br>";
echo "Caracter en hex: " . "\xab" . PHP_EOL . "<br>";
echo "Caracter en Unicode: " . "\u{20af}" . PHP_EOL . "<br>";

?>

</body>
</html>
