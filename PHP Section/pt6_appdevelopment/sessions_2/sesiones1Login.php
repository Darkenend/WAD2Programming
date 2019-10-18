<?php
/*
 * Formulario de login habitual
 * si va bien abre sesión, guarda el nombre de usuario y redirige a principal.php
 * si va mal, mensaje de error
 */
function comprobarUsuario($nombre, $clave) {
    if ($nombre === 'usuario' and $clave === '1234') {
        $usu['nombre'] = 'usuario';
        $usu['rol'] = 0;
        return $usu;
    } elseif ($nombre === 'admin' and $clave === '1234') {
        $usu['nombre'] = 'admin';
        $usu['rol'] = 1;
        return $usu;
    } else return false;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usu = comprobarUsuario($_POST['usuario'], $_POST['clave']);
    if ($usu == false) {
        $err = true;
        $usuario = $_POST['usuario'];
    } else {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        header('Location: sesiones1Principal.php');
        die();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de login</title>
</head>
<body>
<?php
if (isset($_GET['redirigido'])) {
    echo '<p>Haga login para continuar</p>';
}
if (isset($err) and $err == true) {
    echo '<p>Revise usuario y contraseña</p>';
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    Usuario
    <input value="<?php if (isset($usuario)) echo $usuario; ?>" id="usuario"
           name="usuario" type="text">
    Clave
    <input id="clave" name="clave" type="password">
    <input type="submit">
</form>
</body>
</html>