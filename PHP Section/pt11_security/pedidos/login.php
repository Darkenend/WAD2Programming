<?php
require_once 'bd.php';

/*
 * Formulario de login:
 * 		- Si va bien: abre sesión, guarda los datos del usuario: CodRes y correo en $_SESSION['usuario']
 * 		 e inicializa el carrito ($_SESSION['carrito'] = []) y redirige a categorias.php (página principal).
 * 		- Si va mal, mensaje de error.
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usu = comprobarUsuario($_POST['usuario'], $_POST['clave']);
    if ($usu === FALSE) {
        $err = TRUE;
        $usuario = $_POST['usuario'];
    } else {
        session_start();
        //$usu tiene campos correo y codres
        $_SESSION['usuario'] = $usu;
        $_SESSION['carrito'] = [];
        header('Location: categorias.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formuario de login</title>
</head>

<body>

<?php
/**
 * Se le ha enviado aquí desde otra página por
 * no cumplir requisitos de control de acceso (comprobarSesion())
 */
if (isset($_GET['redirigido'])) {
    echo '<p>Haga login para continuar</p>';
}
/**
 * Fallo de usuario y/o contraseña
 */
if (isset($err) and $err = TRUE) {
    echo '<p>Revise usuario y contraseña</p>';
}
?>

<form action="<?php
echo htmlspecialchars($_SERVER['PHP_SELF']);
?>" method="POST">
    <label for="usuario">Usuario</label>
    <input type="text" id="usuario" name="usuario" value="<?php
    if (isset($usuario)) echo $usuario;
    ?>">
    <label for="clave">Clave</label>
    <input type="password" id="clave" name="clave">
    <input type="submit">
</form>
</body>
</html>
