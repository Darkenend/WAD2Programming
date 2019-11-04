<!DOCTYPE html>

<html>
<head>
    <title>Función htmlspecialchars</title>
</head>
<body>
<?php
$cadenaOriginal = '<strong>Me gusta PHP</strong>';
$cadenaRetocada = htmlspecialchars($cadenaOriginal);
echo $cadenaRetocada;
?>
</body>
</html>
