<!DOCTYPE html>

<html>
<head>
    <title>$_FILES</title>
</head>
<body>
    <h2>Ejemplo FILES POST</h2>
    <form method="post" enctype="multipart/form-data">
        Archivo: <input type="file" name=archivo"><br>
        <input type="submit" value="Enviar">
    </form>
    <pre>
<?php
if ($_FILES) {
    print_r($_FILES);
}
?>
    </pre>
</body>
</html>
