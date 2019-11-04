<!DOCTYPE html>
<html>
<head>
	<title>Funciones settype y gettype</title>
</head>

<body>

<?php
$a = $b = "3.1416";
settype($b, "float");
print "\$a vale $a y es de tipo " . gettype($a);
print "<br />";
print "\$b vale $b y es de tipo " . gettype($b);
?>

</body>
</html>
