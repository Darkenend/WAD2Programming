<!DOCTYPE html>
<html>
<head>
	<title>array_column</title>
</head>

<body>

<?php
echo "Devuelve un array que corresponde a una columna de una matriz<br/>\n";
$numeros = array(
	array("español" => "uno", "ingles" => "one"),
	array("español" => "dos", "ingles" => "two"),
	array("español" => "tres", "ingles" => "three"),
	array("español" => "...", "ingles" => "...")
);
print_r($numeros);
echo "<br/>\n";
echo "numeros en inglés: <br/>\n";
$ingles = array_column($numeros, "ingles");
print_r($ingles); 
?>

</body>
</html>
