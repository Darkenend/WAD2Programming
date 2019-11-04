<?php
$contenido = file_get_contents("ficheroEjemplo.txt");
echo "Contenido del fichero: $contenido <br>";
$res = file_put_contents("ficheroSalida.txt", "Fichero creado con file_put_contents");
if ($res) {
    echo "Fichero creado con éxito";
} else {
    echo "Error al crear el fichero";
}
?>