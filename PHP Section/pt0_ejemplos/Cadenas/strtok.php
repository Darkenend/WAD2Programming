<!DOCTYPE html>
<html>
<head>
	<title>strtok</title>
</head>

<body>

<?php
$string = "Hello world. Beautiful day today.";
$token = strtok($string, " ");
while ($token !== false) { //retorna false cuando no hay más tokens
	echo "$token<br />\n";
	$token = strtok(" ");
}
?>

</body>
</html>
