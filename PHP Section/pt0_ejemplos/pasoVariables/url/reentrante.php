<!DOCTYPE html>
<html>
<head>
	<title>reentrante</title>
</head>

<body>

<?php
if (!$_GET){
	for ($i = 1; $i <= 10; $i++) {
		echo "<br><a href=reentrante.php?tabla=$i>Ver la tabla del $i</a>\n";
	}
} else {
	$tabla=$_GET["tabla"];
?>
<table align="center" border="1" cellpadding="1">
<?php
for($i = 0; $i <= 10; $i++) {
	echo "<tr><td>$tabla X $i</td><td> = </td><td>" . $tabla * $i . "</td></tr>\n";
}
?>
</table>
<?php
}
?>

</body>
</html>
