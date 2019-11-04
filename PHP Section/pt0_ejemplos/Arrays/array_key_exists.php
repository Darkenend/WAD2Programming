<!DOCTYPE html>
<html>
<head>
	<title>array_key_exists</title>
</head>

<body>

<?php
echo "verifica si un índice o clave dada existe en el array<br/>\n";
$test = array(
	"1" => "primero",
	"salchicha" => "segundo",
	"3.0" => "tercero"
);
if (array_key_exists("salchicha", $test))
	echo 'Existe';
else
	echo 'No Existe';

?>

</body>
</html>
