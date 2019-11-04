<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>
<body>
<?php
$a = 1;
$b = "3.34";
$c = "Contenedor de código PHP7";
function ejemploVariables() {
    global $a, $b, $c; //sin global son locales
    echo $a . "<br>" . $b . "<br>" . $c;
}
ejemploVariables();
?>
</body>
</html>
