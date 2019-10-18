<?php
//aquí va el código que se debe añadir
if (isset($_POST['lang'])) {
    $lang = $_POST['lang'];
    setcookie('lang', $lang, 5*60);
} else if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = "es";
}
$strings_es = ["en", "Esta pagina es un ejemplo de seleccion de idiomas mediante cookies, selecciona un valor en el formulario de abajo, y comprueba que cambia al idioma correcto", "Selecciona un idioma:", "Español", "Inglés"];
$strings_en = ["in", "This page is an example of language selection through cookies, select a value in the form below, and check that it changes languages properly", "Select a language", "Spanish", "English"];
$strings = [];
if ($lang == "en") {
    $strings = $strings_en;
} else {
    $strings = $strings_es;
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang?>">
<head>
    <title>Cookies
        <?php
            echo $strings[0];
        ?>
        PHP</title>
</head>
<body>
<p>
    <?php
        echo $strings[1];
    ?>
</p>
<form action="index.php" method="post">
    <label for="lang_id">
        <?php
        echo $strings[2];
        ?>
    </label>
    <br>
    <select id="lang_id" name="lang">
        <option value="es">
            <?php
            echo $strings[3];
            ?>
        </option>
        <option value="en">
            <?php
            echo $strings[4];
            ?>
        </option>
    </select>
    <input type="submit" value="Actualizar el estilo">
</form>
</body>
</html>