<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>
<body>
<?php
$a = 8;
$b = 3;
$c = 9;

echo '$a = 8, $b = 3 y $c = 9<br>';

if ($a == 8 && $b == 3) echo '$a es 8 y $b es 3 <br>';
else echo 'Alguna condición no cumplió la validación <br>';

if ($a == 8 and $b == 3) echo '$a es 8 y $b es 3 <br>';
else echo 'Alguna condición no cumplió la validación <br>';

if ($a == 8 || $c == 5) echo '$a es 8 o $c es 5 <br>';
else echo 'Ni $a es 8 ni $c es 5 <br>';

if ($a == 8 or $c == 5) echo '$a es 8 o $c es 5 <br>';
else echo 'Ni $a es 8 ni $c es 5 <br>';

if (!($a > $c)) echo '$a no es mayor que $c <br>';
else echo '$a es mayor que $c <br>';
?>
</body>
</html>
