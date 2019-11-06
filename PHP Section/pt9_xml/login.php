<?php
/* si va bien redirige a principal.php si va mal, mensaje de error */
$db_l = "";
$db_p = "";
$schema = new DOMDocument();
$schema->load('configuracion.xml');
if (file_exists('configuracion.xml') && $schema->schemaValidate('configuracion.xsd')) {
    $data = simplexml_load_file('configuracion.xml');
    $db_l = (string) $data->usuario;
    $db_p = (string) $data->clave;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['usuario'] === $db_l and $_POST['clave'] === $db_p) {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $amount = null;
        if (!file_exists('session_amount.xml')) {
            file_put_contents("session_amount.xml", "<?xml version=\"1.0\" encoding=\"UTF-8\"?><logins><amount>0</amount></logins>");
        }
        $amount = simplexml_load_file('session_amount.xml');
        $am_int = (int) $amount->amount;
        $am_int = $am_int+1;
        $_SESSION['amount'] = $am_int;
        $amount->amount = $am_int;
        $amount->asXML('session_amount.xml');
        header('Location:principal.php');
    }
    else $err = true;
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
    <input value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>" id="usuario" name="usuario" type="text">
    <label for="clave">Clave</label>
    <input id="clave" name="clave" type="password">
    <input type="submit">
</form>

</body>
</html>