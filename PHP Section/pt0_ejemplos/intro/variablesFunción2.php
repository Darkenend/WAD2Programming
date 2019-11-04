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
    //Observar que se usa el nombre de la variable sin $
    echo $GLOBALS["a"] . "<br>" . $GLOBALS["b"] . "<br>" . $GLOBALS["c"];
}
ejemploVariables();
?>
</body>
</html>
