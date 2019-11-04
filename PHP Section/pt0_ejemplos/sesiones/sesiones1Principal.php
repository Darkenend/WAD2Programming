<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: sesiones1Login.php?redirigido=true');
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="./css/altaUsuarios.css"> -->
    <title>Página principal</title>
</head>
<body>
    <?php echo 'Bienvenido ' . $_SESSION['usuario']; ?>
    <br><a href="sesiones1Logout.php">Salir</a>
</body>
</html>