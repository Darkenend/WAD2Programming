<!DOCTYPE html>
<html>
<head>
	<title>array_unique</title>
</head>

<body>

<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'array_unique elimina valores duplicados de un array' . EOL();
echo 'array_unique($array[, $sort_flags = SORT_STRING])' .EOL();
echo 'Devuelve un nuevo array sin duplicados. Se conservan las claves.' .EOL();
echo 'Ordena los valores tratándolos como cadenas' .EOL();
echo 'Dos elementos se consideran iguales si: (string)$elem1 === (string)$elem2' . EOL();
echo '$sort_flags = SORT_REGULAR | SORT_NUMERIC | SORT_STRING | SORT_LOCALE_STRING' . EOL();
$entrada = array("a" => "verde",
				 "rojo",
				 "b" => "verde",
				 "azul",
				 "rojo"
			);
echo '$entrada: '; var_dump($entrada); echo EOL();
$resultado = array_unique($entrada);
echo '$resultado = array_unique($entrada)' . EOL();
echo '$resultado: '; print_r($resultado);echo EOL();
?>

</body>
</html>
