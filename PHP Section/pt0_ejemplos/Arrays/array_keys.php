<!DOCTYPE html>
<html>
<head>
	<title>array_keys</title>
</head>

<body>

<?php
function EOL() { return PHP_EOL . '<br>';}
echo 'array_keys devuelve todas las claves de un array o un subcjto de claves' . EOL();
echo 'array_keys($array)' . EOL() . 'array_keys($array, $search_value[, $strict = FALSE])' . EOL();
echo 'Devuelve un array con todas las claves o aquellas de $search_value' . EOL();
$array = array(
	0=>100,
	"color"=>"red"
);
echo '$array: '; var_dump($array); echo EOL();
echo 'array_keys($array)' . EOL();
var_dump(array_keys($array));
echo EOL();

$array = array("blue", "red", "green", "blue", "blue");
echo '$array: '; var_dump($array); echo EOL();
echo 'array_keys($array, "blue")' . EOL();
var_dump(array_keys($array, "blue"));
echo EOL();
$array = array(
	"color"=>array("blue", "red", "green"),
	"size"=>array("small", "medium", "large")
);
echo '$array: '; var_dump($array); echo EOL();
echo 'array_keys($array)' . EOL();
var_dump(array_keys($array));
echo EOL();
?>

</body>
</html>
