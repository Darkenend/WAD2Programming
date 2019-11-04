<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
<head>
	<title>substr_count</title>
</head>

<body>

<?php
$text = "This is a test";
echo strlen($text); //14
echo "<br/>\n";
echo substr_count($text, 'is'); //2
echo "<br/>\n";
echo substr_count($text, 'is', 3); //1
echo "<br/>\n";
echo substr_count($text, 'is', 3, 3); //0
echo "<br/>\n";
echo substr_count($text, 'is', 5, 10); //Advertencia
echo "<br/>\n";
$text2 = 'gcdgcdgcd';
echo substr_count($text2, 'gcdgcd'); //1 - no tiene en cuenta solapes
echo "<br/>\n";
?>

</body>
</html>
