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
if (isset($_SESSION["contador"])) ++$_SESSION["contador"];
else $_SESSION["contador"] = 1;
$contador = $_SESSION["contador"];
echo '<a href="contador.php">Has recargado esta página ' . $contador . ' veces</a>';
?>

</body>
</html>
