<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

$string_base = "Wubba Lubba Dub Dub!";

//Parte A
echo "Aparece A ".(substr_count($string_base, "a")+substr_count($string_base,"A"))." veces <br>";

//Parte B
$pos = stripos($string_base, "a");
if (!$pos) {
    echo "No hay ninguna a en la frase";
} else {
    echo "A aparece en la posicion ".$pos."<br>";
}

//Parte C
echo str_ireplace("o", "0", $string_base);
?>
</body>
</html>