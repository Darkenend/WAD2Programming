<!DOCTYPE html>
<html>
<head>
	<title>holaNombreComprobación</title>
</head>

<body>

<?php
if (empty($_GET['nombre']))
	echo 'Error, falta el parámetro nombre';
else
	echo 'Hola ' . $_GET['nombre'];
?>

</body>
</html>
