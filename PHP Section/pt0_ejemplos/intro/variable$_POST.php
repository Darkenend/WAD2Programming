<!DOCTYPE html>

<html>
<head>
    <title>$_POST</title>
</head>
<body>
<h3>Ejemplo POST</h3>
<form method="POST">
    Escribe tu nombre:
    <input type="text" name="nombre" value="tu nombre"> <br>
    Escribe tu edad:
    <input type="text" name="edad" value="tu edad"><br>
    <input type="submit" value="Enviar">   
</form>
<?php
if ($_POST) { //solo se entra si se le da a submit
    print_r($_POST);
}
?>
</body>
</html>
