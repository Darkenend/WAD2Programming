<?php
require_once 'bootstrap.php';
require_once './src/Equipo.php';
require_once 'procesarFormBorrado.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserción Equipos</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        ID: <input type="number" name="idEquipo" id="idEquipo" min="1"><br>
        <input type="submit" value="Borrar">
    </form>
    <br>
    <p>
    Mensaje: <?php echo !empty($mensaje)?$mensaje:"Introduce un ID" ?>
    </p>
</body>
</html>