<?php
// poner el contenido de un fichero en una cadena
$nombre_fichero = "archivo.txt";
$gestor = fopen($nombre_fichero, "r"); //en Windows 'rb'
$contenido = fread($gestor, filesize($nombre_fichero));
echo $contenido;
fclose($gestor);

$nombre_fichero = "php.jpg";
$gestor = fopen($nombre_fichero, "r"); //en Windows 'rb'
$contenido = fread($gestor, filesize($nombre_fichero));
echo $contenido;
fclose($gestor);