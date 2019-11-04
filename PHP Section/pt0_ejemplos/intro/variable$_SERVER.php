<!DOCTYPE html>

<html>
<head>
    <title>$_SERVER</title>
</head>
<body>
    <pre>
<?php    
print_r($_SERVER);

echo '<hr>';
echo 'Ruta dentro de la raiz del servidor(/var/www/html/) de este script: ' . $_SERVER['PHP_SELF'] . '<br>';
echo 'Nombre (o IP) del servidor: ' . $_SERVER['SERVER_NAME'] . '<br>';
echo 'Software del servidor: ' . $_SERVER['SERVER_SOFTWARE'] . '<br>';
echo 'Protocolo: ' . $_SERVER['SERVER_PROTOCOL'] . '<br>';
echo 'Método de petición: ' . $_SERVER['REQUEST_METHOD'] . '<br>';
?>
    </pre>
</body>
</html>
