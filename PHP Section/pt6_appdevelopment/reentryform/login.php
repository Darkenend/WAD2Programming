<?php
/* si va bien redirige a principal.php si va mal, mensaje de error */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['usuario'] === 'usuario' and $_POST['clave'] === '1234')
        header('Location:principal.php');
    else
        $err = true;
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
if (isset($err)) echo '<p>Revise usuario y contraseña</p>';
?>
<form action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <label for="usuario">Usuario</label>
    <input value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>"
           id="usuario" name="usuario" type="text">
    <label for="clave">Clave</label>
    <input id="clave" name="clave" type="password">
    <input type="submit">
</form>
</body>
</html>
