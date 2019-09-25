<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

$pairs = mt_rand(2, 10);
$num_one = array($pairs);
$num_two = array($pairs);
$res = array($pairs);
for ($i = 0; $i < $pairs; $i = $i + 1) {
    $num_one[$i] = mt_rand(-20, 20);
    $num_two[$i] = mt_rand(-20, 20);
    while ($num_two[$i] === 0) {
        $num_two[$i] = mt_rand(-20, 20);
    }
    $res[$i] = $num_one[$i]/$num_two[$i];
}
for ($i = 0; $i < $pairs; $i = $i + 1) {
    if ($res[$i] > 0) {
        echo "Esta es la pareja ".($i+1)." de ".$pairs.". El primer numero era ".$num_one[$i]." y el segundo era ".$num_two[$i].". El resultado de la division da +".number_format($res[$i], 3, '.', ' ')."<br>";
    } else {
        echo "Esta es la pareja ".($i+1)." de ".$pairs.". El primer numero era ".$num_one[$i]." y el segundo era ".$num_two[$i].". El resultado de la division da ".number_format($res[$i], 3, '.', ' ')."<br>";
    }
}
?>
</body>
</html><?php
