<!DOCTYPE html>
<html>
<head>
	<title>Funciones isset y unset</title>
</head>

<body>

<?php
$a = "3.1416";
if (isset($a))
	echo '$a está definida y no es null' . '<br />';
unset($a);
if (!isset($a))
	echo '$a no está definida o es null';
?>

</body>
</html>
