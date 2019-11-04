<?php
$fh = fopen('prueba.html', 'a');
fwrite($fh, '<h1>¡Hola mundo!</h1>');
fclose($fh);

echo file_get_contents('prueba.html');

unlink('prueba.html');