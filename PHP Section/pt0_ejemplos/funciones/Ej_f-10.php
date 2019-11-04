<?php
/*
 * Haz un programa que dada una fecha en formato dd-mm-aaaa, compruebe
 * si existe o no. Se tienen en cuenta los bisiestos: un año es bisiesto si bla, bla, bla.
 * Como ejercicio de programación se puede hacer con el bla, bla, bla. Pero esto
 * es de primero y se supone quue sabéis programar.
 * Nos vamos a basar en DateTime (si algo ya está programado y funciona ... se usa)
 */
require_once 'libreriaEjFunciones.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 10</title>
</head>

<body>

<?php
echo '01-02-1999 --> '; 
echo comprobarFecha('01-02-1999')?'existe':'no existe';
echo EOL();
echo '29-02-2018 --> '; 
echo comprobarFecha('29-02-2018')?'existe':'no existe';
echo EOL();
echo '12-13-2018 --> '; 
echo comprobarFecha('12-13-2018')?'existe':'no existe';
echo EOL();
echo '13-12-2018 --> '; 
echo comprobarFecha('13-12-2018')?'existe':'no existe';
echo EOL();
echo 'Asterix y Obelix --> '; 
echo comprobarFecha('Asterix y Obelix')?'existe':'no existe';
echo EOL();
?>

</body>
</html>
