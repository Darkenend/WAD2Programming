<!DOCTYPE html>
<html>
<head>
	<title>Formulario reentrante</title>
</head>

<body>

<?php
if (!$_POST) { //No hay datos
?>
<form action="reentrante.php" method="post">
	Nombre: <input type="text" name="nombre" size="30">
	<br>
	Empresa: <input type="text" name="empresa" size="30">
	<br>
	Telefono: <input type="text" name="telefono" size=14 value="+34 ">
	<br>
	<input type="submit" value="Enviar">
</form>
<?php
} else { //Hay datos
	echo "<br>Su nombre: " . $_POST["nombre"]; 
	echo "<br>Su empresa: " . $_POST["empresa"];
	echo "<br>Su teléfono: " . $_POST["telefono"];
}
?>
</body>
</html>
