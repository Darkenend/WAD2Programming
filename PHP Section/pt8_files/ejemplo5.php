<?php
$fichero = 'archivo.txt';
$nuevo_fichero = 'archivo.txt.bak';
if (!copy($fichero, $nuevo_fichero)) {
    echo "Error al copiar $fichero...\n";
}
