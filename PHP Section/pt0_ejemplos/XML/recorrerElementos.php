<?php
/**
 * Nuevo objeto SimpleXMLElement al que se le pasa ruta de archivo.
 * Forma de trabajar XML estilo OOP
 * @link https://www.php.net/manual/en/simplexmlelement.construct.php 
 */
$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
foreach ($usuarios as $usuario){
    echo "Nombre: ". $usuario->nombre ."<br>";
    foreach($usuario->contacto as $contact){
        echo "Teléfono: ". $contact->telefono . "<br>";
        echo "Email: ".$contact->email . "<br>";
    }
}
