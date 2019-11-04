<?php
if (file_exists("empleados.xml")) {
    $datos = simplexml_load_file("empleados.xml");
    echo '<br>';
    if ($datos === false) {
        echo 'Error al leer el fichero XML';
    } else {
        foreach ($datos as $valor) {
            print_r($valor);
            echo '<br>';
        }
    }
} else {
    exit("Error abriendo el fichero empleados.xml");
}
?>