<!DOCTYPE html>
<html>
<head>
	<title>in_array</title>
</head>

<body>

<?php
function EOL() {return PHP_EOL . '<br>';}
echo 'in_array comprueba si un valor existe en un array' . EOL();
echo 'in_array($neddle, $haystack[, $strict = FALSE])' . EOL();
echo 'Si $strict es TRUE la comparación es ===. Si es FALSE ==' . EOL();
echo 'Devuelve TRUE si existe. FALSE en caso contrario. <br>';
$os = array("Mac", "NT", "Irix", "Linux");
echo '$os = '; var_dump($os); echo EOL();
if (in_array("Irix", $os)) echo "Existe Irix" . EOL();
if (in_array("mac", $os, true)) echo "Existe mac" . EOL();
else echo "No existe mac" . EOL();
?>

</body>
</html>
