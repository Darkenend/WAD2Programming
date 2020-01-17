<?php
//Formulario reentrante para insertar un equipo
require_once 'bootstrap.php';
require_once './src/Equipo.php';
require_once 'procesarFormDelete.php';
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Borrado equipos</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    Id<br>
    <input type="number" name="id" min="1" required><br>
    <input type="submit" value="Borrar">
</form>
<hr>
<p>Mensaje: <?php echo !empty($mensaje)?$mensaje:"Introduce el Id del equipo a borrar" ?></p>
</body>
</html>