<!DOCTYPE html>
<html>
<head>
	<title>Identico vs igual</title>
</head>

<body>

<?php
$arr1 = array(
	1 => "3000",
	2 => "4000"
);
echo 'arr1: ';
var_dump($arr1);
echo '<br>';
$arr2 = array(
	1 => 3000,
	2 => 4000
);
echo 'arr2: ';
var_dump($arr2);
echo '<br>';
$arr3 = array(
	2 => "4000",
	1 => "3000"
);
echo 'arr3: ';
var_dump($arr3);
echo '<br>';
if ($arr1 == $arr2) echo 'arr1 y arr2 son iguales <br>';
else echo 'arr1 y arr2 no son iguales <br>';
if ($arr1 == $arr3) echo 'arr1 y arr3 son iguales <br>';
else echo 'arr1 y arr3 no son iguales <br>';
if ($arr1 === $arr2) echo 'arr1 y arr2 son identicos <br>';
else echo 'arr1 y arr2 no son identicos <br>';
if ($arr1 === $arr3) echo 'arr1 y arr3 son identicos <br>';
else echo 'arr1 y arr3 no son identicos <br>';
?>

</body>
</html>
