<?php
// Nuevo objeto SimpleXMLElement al que se le pasa un archivo xml
$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
// foreach para acceder a hijos de elementos
foreach ($usuarios->children() as $usuario){
    echo "Nombre de usuario: " . $usuario->nombre . "<br>";
    foreach ($usuario->children() as $contact){
        if (isset($contact->telefono)){
        echo "Telefono: " . $contact->telefono . "<br>";
            }
        }
    }
?>