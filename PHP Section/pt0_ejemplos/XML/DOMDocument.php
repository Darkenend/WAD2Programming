<?php
$dept = new DOMDocument();
$dept->load('empleados.xml');
$res = $dept->schemaValidate('departamento.xsd');
if ($res) {
    echo 'El fichero es válido';
} else {
    echo 'El fichero no es válido';
}
?>