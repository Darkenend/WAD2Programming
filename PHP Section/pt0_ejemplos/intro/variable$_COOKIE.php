<!DOCTYPE html>
<?php
// Establecer valores Cookies
setcookie("Valor_1","1");
setcookie("Valor_2", "2");
setcookie("Valor_3", "3");
?>
<html>
<head>
    <title>$_COOKIE</title>
</head>
<body>
<pre>
<?php
print_r($_COOKIE);
?>
</pre>

</body>
</html>
