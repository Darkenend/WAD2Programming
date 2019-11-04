<!DOCTYPE html>
<html>
<head>
	<title>explode</title>
</head>

<body>

<?php
$pizza = "porción1 porción2 porción3 porción4 porción5 porción6";
$porciones = explode(" ", $pizza);
echo $porciones[0];
echo '<br />';
echo $porciones[1];
?>

</body>
</html>
