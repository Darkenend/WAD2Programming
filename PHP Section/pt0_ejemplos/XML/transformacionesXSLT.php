<?php
//cargar el fichero a transformar
$dept = new DOMDocument();
$dept->load('empleados.xml');
//cargar la transformación
$transformacion = new DOMDocument();
$transformacion->load('departamento.xslt');
//crear el procesador
$procesador = new XSLTProcessor();
//asociar el procesador y la transformación
$procesador->importStylesheet($transformacion);
//transformar
$transformada = $procesador->transformToXML($dept);
echo $transformada;
?>