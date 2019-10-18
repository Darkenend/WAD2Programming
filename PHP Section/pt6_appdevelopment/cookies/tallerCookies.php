<?php
//aquí va el código que se debe añadir
if (isset($_COOKIE['estilo'])) {
    $estilo = $_COOKIE['estilo'];
} else if (isset($_POST['estilo'])) {
    $estilo = $_POST['estilo'];
    setcookie('estilo', $estilo, 5*60);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Cookies en PHP</title>
    <?php
    //Si hay un estilo definido se carga la hoja de estilos correspondiente
    if (isset($estilo)) {
        echo '<link rel="STYLESHEET" type="text/css" href="' . $estilo . '.css">';
    }
    ?>
</head>
<body>
<p>Ejemplo de uso de cookies en PHP para almacenar
    la hoja de estilos css que queremos utilizar
    para definir el aspecto de la página</p>
<form action="tallerCookies.php" method="post">
    Aqui puedes seleccionar el estilo preferido en la página:
    <br>
    <select name="estilo">
        <option value="verde">Verde</option>
        <option value="rosa">Rosa</option>
        <option value="negro">Negro</option>
    </select>
    <input type="submit" value="Actualizar el estilo">
</form>
</body>
</html>