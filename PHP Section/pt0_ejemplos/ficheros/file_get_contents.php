<?php
// Devuelve el contenido de una web
$web = file_get_contents("http://www.google.es");
echo $web;
echo '<br>';
// El código anterior es igual que el siguiente:
$fh = fopen("http://www.google.es", "r");
fpassthru($fh);
echo '<br>';
// Devuelve contenido de un archivo en el directorio actual
$contenido = file_get_contents("archivo.txt");
echo $contenido;
echo '<br>';
// Busca dentro de include_path
$contenido = file_get_contents('archivo.txt', FILE_USE_INCLUDE_PATH);
echo $contenido;
echo '<br>';
// Devuelve 20 caracteres desde el carácter 100
$articulo = file_get_contents('archivo.txt', NULL, NULL, 100, 20);
echo $articulo;
echo '<br>';