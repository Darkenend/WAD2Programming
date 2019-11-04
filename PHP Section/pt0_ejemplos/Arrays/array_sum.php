<!DOCTYPE html>
<html>
<head>
	<title>array_sum</title>
</head>

<body>

<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'array_sum calcula la suma de los valores de un array' . EOL();
echo 'array_sum($array)' . EOL();
echo 'Devuelve un integer o float' . EOL();

$a = array(2, 4, 6, 8);
echo '$a: '; var_dump($a); echo EOL();
echo "sum(a) = " . array_sum($a) . EOL();
$b = array("a" => 1.2, "b" => 2.3, "c" => 3.4);
echo '$b: '; var_dump($b); echo EOL();
echo "sum(b) = " . array_sum($b) . EOL();
$c = array(2, 4, 6, "8");
echo '$c: '; var_dump($c); echo EOL();
echo "sum(c) = " . array_sum($c) . EOL();
$d = array(2, 4, 6, "x");
echo '$d: '; var_dump($d); echo EOL();
echo "sum(d) = " . array_sum($d) . EOL();
?>

</body>
</html>
