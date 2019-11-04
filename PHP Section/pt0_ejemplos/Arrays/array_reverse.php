<!DOCTYPE html>
<html>
<head>
	<title>array_reverse</title>
</head>

<body>

<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'array_reverse($array[, $preserve_keys = false])' . EOL();
echo 'Devuelve un array con los elementos en orden inverso' . EOL();
echo 'preserve_keys solo afecta a las claves numéricas <br>' . EOL();
$input = array(
	"php",
	4.0,
	array("verde", "rojo")
);
echo '$input: '; print_r($input); echo EOL();
$reversed = array_reverse($input);
echo '$reversed: '; print_r($reversed); echo EOL();
$preserved = array_reverse($input, true);
echo '$preserved: '; print_r($preserved); echo EOL();
?>

</body>
</html>
