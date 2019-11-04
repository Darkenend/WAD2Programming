<!DOCTYPE html>
<html>
<head>
	<title>retornar Array</title>
</head>

<body>

<?php
function numerosPequeños() {
	return array(1, 2, 3);
}
list($zero, $one, $two) = numerosPequeños();
echo $zero . ' ' . $one . ' ' . $two;
?>

</body>
</html>
