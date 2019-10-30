<?php
// Contenido de archivo.txt: Hola, ¿Qué tal?
$gestor = fopen('archivo.txt', 'r+');
// Añadimos Hey! , al principio
fwrite($gestor, "Hey!, ");
// Volvemos al inicio
rewind($gestor);
// Añadimos Hey!, al principio
fwrite($gestor, "Hey!, ");
// Si no hacemos este rewind de nuevo, al llamar a fgets, comenzará
// a leer desde el final del anterior fwrite()
rewind($gestor);
echo fgets($gestor); // Devuelve Hey!, ¿Qué tal?
fclose($gestor);
