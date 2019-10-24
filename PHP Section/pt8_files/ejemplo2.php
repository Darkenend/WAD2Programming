<?php
$fich = fopen("ficheroEjemplo.txt", "r");
if ($fich === FALSE) {
    echo "No se encuentra el contenido del fichero o no se pudo leer<br>";
} else {
    while (!feof($fich)) {
        $car = fgetc($fich);
        echo $car;
    }
}
fclose($fich);
