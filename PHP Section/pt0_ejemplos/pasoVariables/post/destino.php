<!DOCTYPE html>
<html>
<head>
	<title>Página destino</title>
</head>

<body>

<?php
echo 'Variable $nombre: ' . $_POST["nombre"] . '<br>' . "\n";
echo 'Variable $apellidos: ' . $_POST["apellidos"] . '<br>' . "\n";
//Con $HTTP_POST_VARS -> obsoleto. Activar en php.ini
?>

</body>
</html>
