<!DOCTYPE html>

<html>
<head>
    <title>Ordenación por clave reversa</title>
</head>
<body>
<?php
$calles = array(
  "h" => "Leganitos",
  "e" => "Castellana",
  "a" => "Bailén",
  "z" => "Fuencarral"
);
echo "original:" . "<br/>\n";
print_r($calles);

echo "<br/>\n" . "krsort:" . "<br/>\n";
krsort($calles);
foreach($calles as $clave =>$valor)
    echo $clave . " = " . $valor . "<br>";
?>
</body>
</html>
