<?php
// Uso junto con file_get_contents y añadiendo al ya existente:
$archivo = "archivo.txt";
$actual = file_get_contents($archivo);
$actual .= "Esto añade más texto al archivo\n";
file_put_contents($archivo, $actual);
// Podemos utilizar también la bandera FILE_APPEND para añadir al final sin eliminar:
$archivo = "archivo.txt";
$mascontenido = "¡Todavía más contenido!\n";
// También vamos a emplear la bandera LOCK_EX para evitar cualquier modificación mientras:
file_put_contents($archivo, $mascontenido, FILE_APPEND | LOCK_EX);

echo file_get_contents($archivo);