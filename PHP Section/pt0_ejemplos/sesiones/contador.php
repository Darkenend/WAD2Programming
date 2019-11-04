<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contador</title>
</head>

<body>

<?php
if (isset($_SESSION["contador"])) $contador = $_SESSION["contador"];
//Si no existe el contador se crea e inicializa
if (isset($contador) == 0) $contador = 0;
++$contador;
$_SESSION["contador"] = $contador;
echo '<a href="contador.php">Has recargado esta página ' . $contador . ' veces</a>';
?>

</body>
</html>
