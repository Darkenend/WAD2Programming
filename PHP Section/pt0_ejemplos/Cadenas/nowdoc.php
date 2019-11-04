<!DOCTYPE html>
<html>
<head>
	<title>Notación nowdoc</title>
</head>

<body>

<?php
$str = <<<'EOD'
Ejemplo de un string
expandido en varias líneas
empeando la sintaxis nowdoc.
EOD;
echo '<br>' . $str;
?>

</body>
</html>
