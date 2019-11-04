<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
<head>
	<title>substr</title>
</head>

<body>

<?php
$rest = substr("abcdef", -1); //f
echo "$rest<br/>\n";
$rest = substr("abcdef", -2); //ef
echo "$rest<br/>\n";
$rest = substr("abcdef", -3, 1); //d
echo "$rest<br/>\n";
$rest = substr("abcdef", 0, -1); //abcde
echo "$rest<br/>\n";
$rest = substr("abcdef", 2, -1); //cde
echo "$rest<br/>\n";
$rest = substr("abcdef", 4, -4); //devuelve false
echo "$rest<br/>\n";
$rest = substr("abcdef", -3, -1); //devuelve "de"
echo "$rest<br/>\n";
?>

</body>
</html>
