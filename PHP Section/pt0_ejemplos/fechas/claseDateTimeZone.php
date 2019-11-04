<!DOCTYPE html>
<html>
<head>
	<title>clase DateTimeZone</title>
</head>

<body>

<?php
$carlos = new DateTime('1982-08-15 15:23:48');
print_r($carlos);
echo '<br>';

//otra manera de cambiar la zona horaria
$timezone = new DateTimeZone('America/Bogota');
$carlos->setTimezone($timezone);

var_dump($carlos);
echo '<br>';

//Otra manera es hacerlo desde el constructor DateTime
$maria = new DateTime('1985-4-5 09:12:43', $timezone);

print_r($maria);
echo '<br>';

?>

</body>
</html>
