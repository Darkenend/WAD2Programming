<?php
/*
 * Formulario de cambio de contraseña no se permiten nuevas contraseñas vacías.
 * si va bien, informa de que se cambió con éxito.
 * si va mal, informa de por qué no se pudo cambiar.
 * En ningún caso se abre sesión y siempre ofrece un enlace para volver al formulario de login.
 */
require 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usu = comprobarUsuario($_POST['usuario'], $_POST['clave']);
    if ($usu == false) {
        $mensaje = 'No se pudo cambiar la contraseña debido a las credenciales o error en la BD';
        $usuario = $_POST['usuario'];
    } else {
        //No se permite nueva contraseña vacía
        if (empty($_POST['nueva'])) {
            $mensaje = 'No se permite una contraseña nueva vacía';
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
        } else {
            if (cambiarContraseñaUsuario($_POST['usuario'], $_POST['clave'], $_POST['nueva'])) {
                $mensaje = 'La contraseña se cambió con éxito';
            } else {
                $mensaje = 'No se pudo cambiar la contraseña debido a las credenciales o error en la BD';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de cambio de contraseña</title>
</head>
<body>
    <?php
    if (isset($mensaje)) {
        echo '<p>' . $mensaje . '</p>';     
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        Usuario
        <input value="<?php if (isset($usuario)) echo $usuario; ?>" id="usuario" name="usuario" type="text">
        <br>Clave
        <input id="clave" name="clave" value="<?php if (isset($clave)) echo $clave; ?>" type="password">
        <br>Nueva clave
        <input id="nueva" name="nueva" type="password">
        <br><input type="submit" value="Cambiar contraseña">
    </form>
    <a href=sesiones1Login.php>Login</a>
</body>
</html>