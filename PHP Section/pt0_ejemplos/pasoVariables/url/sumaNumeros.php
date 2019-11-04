<!DOCTYPE html>
<html>
<head>
	<title>sumaNumeros URL</title>
</head>

<body>

<?php
if (empty($_GET['n1']) or empty($_GET['n2'])) {
	echo 'Error, falta n1 o n2 o ambos';
} elseif (!is_numeric($_GET['n1']) or !is_numeric($_GET['n2'])) {
	echo 'Error, ambos parámetros han de ser números';
} else {
	echo 'La suma es: ' . ($_GET['n1'] + $_GET['n2']);
}

?>

</body>
</html>
