<?php
declare(strict_types = 1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Declaraciones tipos</title>
</head>

<body>

<?php
function suma(int $a, int $b):int {
	return $a + $b;
}
echo suma('5', 3); //con tipos estrictos da error
?>

</body>
</html>
