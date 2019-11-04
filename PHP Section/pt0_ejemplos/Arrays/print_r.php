<!DOCTYPE html>
<html>
<head>
	<title>print_r</title>
</head>

<body>

<?php
echo "Muestra información legible para humanos sobre una variable";
echo "<br/>\n";
$numerosIngles = array(
	"uno" => "one",
	"dos" => "two",
	"tres" => "three",
	"cuatro" => "four",
	"cinco" => "five"
);
print_r($numerosIngles);
echo "<br/>\n";
?>

</body>
</html>