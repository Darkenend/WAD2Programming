<?php
// Nuevo objeto SimpleXMLElement al que se le pasa un archivo xml
$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
// Se puede especificar la ruta reducida y acceder directamente a un elemento:
foreach ($usuarios->xpath('//usuario') as $usuario){
    echo $usuario->apellido . "<br>";
}
// O especificar la ruta absoluta:
foreach ($usuarios->xpath('/usuarios/usuario') as $usuario){
    echo $usuario->nombre . "<br>";
}