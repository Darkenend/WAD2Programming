<?php
// Nuevo objeto SimpleXMLElement al que se le pasa un archivo xml
$usuarios = new SimpleXMLElement('usuarios.xml', 0, true);
// Añadimos usuario, elementos y atributo
$nuevoUsuario = $usuarios->addChild('usuario');
$nuevoUsuario->addAttribute('sexo', 'Hombre');
$nuevoUsuario->addChild('nombre', 'Bernard');
$nuevoUsuario->addChild('apellido', 'Madoff');
var_dump($usuarios->usuario[2]);
/*
Devuelve:
object(SimpleXMLElement)[5]
  public '@attributes' =>
    array (size=1)
      'sexo' => string 'Hombre' (length=6)
  public 'nombre' => string 'Bernard' (length=7)
  public 'apellido' => string 'Madoff' (length=6)
*/
?>