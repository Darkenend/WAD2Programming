<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>count</title>
</head>

<body>

<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'Cuenta todos los elementos de una array' . EOL();
echo 'count($array[, $mode = COUNT_NORMAL])' .EOL();
echo 'Devuelve el número de elementos' .EOL();
$a = [1, 3, 5];
print_r($a); echo EOL();
var_dump(count($a)); //3
echo EOL();
$b = [0=>7, 5=>9, 10=>11];
print_r($b); echo EOL();
var_dump(count($b)); //3
echo EOL();
$b = [];
print_r($b); echo EOL();
var_dump(count($b)); //0
echo EOL();
var_dump(count(null)); //0 WARNING
echo EOL();
var_dump(count(false)); //1 WARNING
?>

</body>
</html>
