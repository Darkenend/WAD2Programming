<?php
require_once 'bootstrap.php';
require_once './src/Equipo.php';
require_once 'procesarFormInsert.php';
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
        Nombre: <input type="text" name="nombre" id="nombre" required><br>
        Fundación: <input type="number" name="fundacion" id="fundacion" min="1800" max="2020" required><br>
        Socios: <input type="number" name="socios" id="socios" min="0" max="200000" required><br>
        Ciudad: <input type="text" name="ciudad" id="ciudad"><br>
        <input type="submit" value="Insertar">
    </form>
    <br>
    <p>
    Mensaje: <?php echo !empty($mensaje)?$mensaje:"Introduce los datos del equipo" ?>
    </p>
</body>
</html>