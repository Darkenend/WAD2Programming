<?php
$fich = fopen("ficheroEjemplo.txt", "r");
if ($fich === FALSE) {
    echo "No se encuentra el fichero <br>";
} else {
    echo "El fichero se abrió con éxito <br>";
    fclose($fich);
}
$fich = fopen("ficheroEjemploNoExistente.txt", "r");
if ($fich === FALSE) {
    echo "No se encuentra el fichero <br>";
} else {
    echo "El fichero se abrió con éxito <br>";
    fclose($fich);
}
