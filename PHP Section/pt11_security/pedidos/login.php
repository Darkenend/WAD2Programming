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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>Formuario de login</title>
</head>

<body>
<div class="container-fluid">
<?php
/**
 * Se le ha enviado aquí desde otra página por
 * no cumplir requisitos de control de acceso (comprobarSesion())
 */
if (isset($_GET['redirigido'])) {
    echo '<div class="alert alert-info" role="alert">Haga login para continuar</div>';
}
/**
 * Fallo de usuario y/o contraseña
 */
if (isset($err) and $err = TRUE) {
    echo '<div class="alert alert-danger" role="alert">Revise usuario y contraseña</div>';
}
?>
<fieldset>
<legend>Login</legend>
<form action="<?php
echo htmlspecialchars($_SERVER['PHP_SELF']);
?>" method="POST">
    <div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" class="form-control" aria-describedby="nombreHelp" id="usuario" name="usuario" value="<?php if (isset($usuario)) echo $usuario;?>">
        <small id="nombreHelp" class="form-text text-muted">Usuario con el que loguearse</small>
    </div>
    <div class="form-group">
        <label for="clave">Clave</label>
        <input type="password" id="clave" name="clave" class="form-control">
    </div>
    <input type="submit">
</form>
</fieldset>
</div>
</body>
</html>
