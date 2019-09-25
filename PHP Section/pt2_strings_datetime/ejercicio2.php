<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>
<body>
<?php

$word = $_GET['word'];
if (!isset($_GET['pre'])) {
    echo "No me has pasado el prefijo!";
} else {
    $pre = $_GET['pre'];
}
if (strpos($word, $pre, 0) === 0) {
    echo "La palabra empieza por las mismas letras concordando mayusculas y minusculas<br>";
} else {
    echo "La palabra no empieza por las mismas letras y/o no concuerdan las mayusculas y minusculas<br>";
}
if (stripos($word, $pre, 0) === 0) {
    echo "La palabra empieza por las mismas letras";
} else {
    echo "La palabra no empieza por las mismas letras";
}
?>
</body>
</html>
