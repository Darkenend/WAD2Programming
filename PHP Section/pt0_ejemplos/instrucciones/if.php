<!DOCTYPE html>

<html>
<head>
    <title>Sentencia if</title>
</head>
<body>
<?php
//Mensajes
$español = "Hola";
$ingles = "Hello";
$frances = "Bonjour";

//Leer lengua navegador
$idioma = substr($HTTP_ACCEPT_LNAGUAGE, 0, 2);

//Saludo en función del idioma
if ($idioma == "es") echo "$español";
elseif ($idioma == "fr") echo "$frances";
else echo "$ingles";
?>
</body>
</html>
