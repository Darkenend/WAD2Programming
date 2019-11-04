<?php
// Iniciar sesión
session_start();
$_SESSION['variable_de_sesion_1'] = "Algún valor";
$_SESSION['variable_de_sesion_2'] = "Otro valor";
?>
<!DOCTYPE html>

<html>
<head>
    <title>$_SESSION</title>
</head>
<body>
    <pre>
<?php
print_r($_SESSION);
?>
    </pre>


</body>
</html>
