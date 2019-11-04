<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>session_start()</title>
</head>

<body>

<?php
$_SESSION["miVariableDeSesion"] = "Hola este es el valor de la variable de sesión"
?>
<a href="otraPagina.php">Ir a otra página</a>
</body>
</html>
