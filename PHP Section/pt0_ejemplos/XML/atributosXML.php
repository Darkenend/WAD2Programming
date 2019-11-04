<?php
$string = '<usuarios>
    <usuario>
        <nombre>Monnie</nombre>
        <apellido>Boddie</apellido>
        <direccion>Calle Pedro Mar 12</direccion>
        <ciudad>Mexicali</ciudad>
        <pais>Mexico</pais>
        <contacto tipo="telefono">44221234</contacto>
        <contacto tipo="url">http://monnie.ejemplo.com</contacto>
        <contacto tipo="email">monnie@ejemplo.com</contacto>
    </usuario>
    </usuarios>';
// Nuevo objeto SimpleXMLElement al que se le pasa el string xml
// Cuando se usa un string en vez de un fichero para crear el objeto solo hay un parámetro
$usuarios = new SimpleXMLElement($string);
//Observar la notación de array para el primer usuario
echo "Nombre de usuario: " . $usuarios->usuario[0]->nombre . "<br>";
foreach($usuarios->usuario[0]->contacto as $contacto) {
        //acceso al atributo - asociativo
        switch((string) $contacto['tipo']){
            case 'telefono':
                echo "Telefono: " . $contacto . "<br>";
                break;
            case 'email':
                echo "Email: " . $contacto . "<br>";
        }
}
?>