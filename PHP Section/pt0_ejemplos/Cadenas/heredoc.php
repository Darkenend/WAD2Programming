<!DOCTYPE html>
<html>
<head>
	<title>Notación heredoc</title>
</head>

<body>

<?php
$str = <<<EOD
Ejemplo de una cadena
expandida en varias líneas
empleando la sintaxis heredoc.
EOD;
echo $str;
$str2 = <<<"FOOBAR"
¡Hola Mundo!
FOOBAR;
echo '<br>' . $str2;
?>

</body>
</html>
