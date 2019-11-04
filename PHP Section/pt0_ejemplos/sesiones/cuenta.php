<?php
session_start();
if (!isset($_SESSION["cuentaPaginas"])) $_SESSION["cuentaPaginas"] = 1;
else $_SESSION["cuentaPaginas"]++;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cuenta páginas</title>
</head>

<body>

<?php
echo "Desde que entraste has visto " . $_SESSION["cuentaPaginas"] . " páginas";
?>
<br>
<a href="otraCuenta.php">Ver otra página</a>

</body>
</html>
