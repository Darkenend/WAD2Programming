<?php
// Nuevo objeto SimpleXMLElement al que se le pasa un archivo xml
$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
echo $usuarios->getName(); // usuarios
echo '<br>';
echo $usuarios->usuario->getName(); // usuario
echo '<br>';
// Elementos disponibles en usuario:
foreach ($usuarios->usuario[0] as $user){
    echo $user->getName() . "<br>";
}
?>