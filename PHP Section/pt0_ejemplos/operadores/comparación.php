<!DOCTYPE html>

<html>
<head>
    <title>operadores comparación</title>
</head>
<body>
<?php
$a = 8;
$as = "8";
$b = 3;
$c = 5;

echo "\$a = 8 ";
echo "\$as = 8 ";
echo "\$b = 3 ";
echo "\$c = 5<br>";

if ($a == $b) echo "\$a es igual que \$b <br>";
else echo "\$a no es igual que \$b <br>";

if ($a === $as) echo "\$a es idéntico a \$as <br>";
else echo "\$a no es idéntico a \$as <br>";

if ($a != $b) echo "\$a es distinto que \$b <br>";
else echo "\$a es igual que \$b <br>";

if ($a < $b) echo "\$a es menor que \$b <br>";
else echo "\$a no es menor que \$b <br>";

if ($a > $b) echo "\$a es mayor que \$b <br>";
else echo "\$a no es mayor que \$b <br>";

if ($a <= $c) echo "\$a es menor o igual que \$c <br>";
else echo "\$a no es mayor o igual que \$c <br>";

if ($a >= $c) echo "\$a es mayor o igual que \$c <br>";
else echo "\$a no es mayor o igual que \$c <br>";

//orden
echo "\$a <=> \$b = " . ($a <=> $b) . "<br>";
echo "\$b <=> \$a = " . ($b <=> $a) . "<br>";
echo "\$a <=> \$a = " . ($a <=> $a) . "<br>";


//el primero que existe y no es null
echo '$a ?? $b = ' . ($a ?? $b) . "<br>"; //$a
echo '$b ?? $a = ' . ($b ?? $a) . "<br>"; //$b
echo '$d ?? $a = ' . ($d ?? $a) . "<br>"; //$a
echo '(unset)$b ?? $a = ' . ((unset)$b ?? $a) . "<br>"; //$a
?>
</body>
</html>
