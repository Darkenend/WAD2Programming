<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("libreria.php");
// Esto le dice a PHP que usaremos cadenas UTF-8 hasta el final
mb_internal_encoding('UTF-8');
//Esto le dice a PHP que generaremos cadenas UTF-8
mb_http_output('UTF-8');
$titulo = "My Web";
hacerEncabezado($titulo);
?>
<body>
<?php
    escribeSepara("Hola");
    echo "<br>";
    //Mirar porqué no va
    escribeSepara("Texto más largo, a ver lo que hace");
    echo "<br>";
    mb_escribeSepara("Texto más largo, a ver lo que hace");
    echo "<br>";
    fechaHoy();
?>
</body>
</html>
