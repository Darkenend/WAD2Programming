<!DOCTYPE html>

<html>
<head>
    <title>Arrays comunes</title>
</head>
<body>
<?php
$sentido[1] = "ver";
$sentido[2] = "tocar";
$sentido[3] = "oir";
$sentido[4] = "gustar";
$sentido[5] = "oler";

//recorrer y mostrar el array
echo "<p>Los sentidos:</p>";
echo "<ul>";
for ($i = 1; $i < 6; $i++)
    echo "<li>$sentido[$i]</li>";
echo "</ul>";
?>
</body>
</html>
