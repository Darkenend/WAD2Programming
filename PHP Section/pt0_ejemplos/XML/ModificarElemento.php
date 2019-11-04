<?php
// Nuevo objeto SimpleXMLElement al que se le pasa un archivo xml
$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
// Usuario 0 antes de cambiar:
foreach ($usuarios->usuario as $usuario) {
    if ((string) $usuario->nombre === "Monnie") $usuario->nombre = "Mannie";
}

foreach ($usuarios->usuario as $usuario) {
    echo "nombre: " . $usuario->nombre . '<br>';
}

//convertir a string XML
$str = $usuarios->asXML();
var_dump($str);

//guardar como fichero xml. el usuario www-data debe tener permisos sobre tmp
$usuarios->asXML('tmp/usuarios2.xml');

?>