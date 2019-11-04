<!DOCTYPE html>
<html>
<head>
	<title>str_replace</title>
</head>

<body>

<?php
$subject = array("Esto es un ejemplo", "Esto es una muestra");
$replace = "-censurado-";
$search = array("ejemplo", "muestra");
echo "array original:" . "<br/>";
for($i = 0; $i < 2; $i++)
	echo $subject[$i] . "<br/>";
echo "array censurado:" . "<br/+>";
$censured = str_replace($search, $replace, $subject);
for($i = 0; $i < 2; $i++)
	echo $censured[$i] . "<br/>";
?>

</body>
</html>
