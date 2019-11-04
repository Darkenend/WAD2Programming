<!DOCTYPE html>
<html>
<head>
	<title>Implode</title>
</head>

<body>

<?php
$array = array('apellido', 'email', 'teléfono');
$separadoPorComas = implode(",", $array);
echo $separadoPorComas;
?>

</body>
</html>
