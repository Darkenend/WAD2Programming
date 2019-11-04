<!DOCTYPE html>
<head>
    <title>array_diff</title>
</head>
<body>
<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'array_diff calcula la diferencia entre arrays' . EOL();
echo 'array_diff($array1, $array2[, $array3 ...])' . EOL();
echo 'Devuelve un array con los valores de $array1 que no están presentes en ninguno de los otros arrays' . EOL();
$array1 = array(
    "a"=>"green",
    "red",
    "blue",
    "red"
);
$array2 = array(
    "b"=>"green",
    "yellow",
    "red"
);
echo '$array1: '; var_dump($array1); echo EOL();
echo '$array2: '; var_dump($array2); echo EOL();
echo '$resultado = array_diff($array1, $array2)' . EOL();
$resultado = array_diff($array1, $array2);
echo '$resultado: '; var_dump($resultado); echo EOL();
?>
</body>
</html>
