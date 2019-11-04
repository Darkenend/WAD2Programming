<?php
// Nuevo objeto SimpleXMLElement al que se le pasa un archivo xml
$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
// Contar número de usuarios
echo "Hay un total de: " . $usuarios->count() . " usuarios en el archivo xml";
?>