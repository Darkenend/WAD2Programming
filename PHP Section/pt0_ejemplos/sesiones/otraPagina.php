<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Otra página -> Leer variables de sesión</title>
</head>

<body>
<p>La variable de sesión:</p>
<?php
echo $_SESSION["miVariableDeSesion"];
?>

</body>
</html>
