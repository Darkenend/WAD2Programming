<?php
$file = "archivo.txt";
$texto = "Hola que tal 12345";
$fp = fopen($file, "w");
fwrite($fp, $texto);
fclose($fp);

//Ahora abriremos el archivo para ir viendo fseek y ftell:

$fp = fopen($file, "r");
// Si lo hemos abierto con r, siempre empieza desde el principio:
echo ftell($fp) . "<br>"; // Devuelve 0
// Colocamos el apuntador en la posicion 10:
fseek($fp, 10);
// Mostramos la posición actual:
echo ftell($fp) . "<br>"; // Devuelve 10
// Se puede indicar una posición sin contenido:
fseek($fp, 1000);
echo ftell($fp) . "<br>"; // Devuelve 1000
// Para ir al final del archivo se emplea un tercer argumento en fseek:
fseek($fp, 0, SEEK_END);
echo ftell($fp) . "<br>"; // Devuelve 18
// Para mover el apuntador a una posición relativa se emplea SEEK_CUR:
fseek($fp, -5, SEEK_CUR);
echo ftell($fp) . "<br>"; // Devuelve 13
fclose($fp);
//No es necesario emplear fseek() para mover el puntero,
//también se puede hacer cuando se lee o se escribe un archivo:

// Cambiar el puntero leyendo un archivo:
$file = "archivo.txt";
$fp = fopen($file, "r");
// Leemos 10 bytes
$datos = fread($fp, 10);
echo ftell($fp) . '<br>'; // Devuelve 10
// Cambiar el puntero escribiendo un archivo:
$file = "archivo.txt";
$texto = "12345";
$fp = fopen($file, "w");
// Escribimos los 5 bytes del texto:
fwrite($fp, $texto);
echo ftell($fp); // Devuelve 5
?>