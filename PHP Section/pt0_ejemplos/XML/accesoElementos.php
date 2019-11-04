<?php
$string = '<usuarios>
    <usuario>
        <nombre>Monnie</nombre>
        <apellido>Boddie</apellido>
        <direccion>Calle Pedro Mar 12</direccion>
        <ciudad>Mexicali</ciudad>
        <pais>Mexico</pais>
        <contacto>
            <telefono>44221234</telefono>
            <url>http://monnie.ejemplo.com</url>
            <email>monnie@ejemplo.com</email>
        </contacto>
    </usuario>
    </usuarios>';
if(!$xml = simplexml_load_string($string)){
    echo "No se ha podido cargar el archivo";
} else {
   foreach ($xml as $usuario){
    //observar la notación de acceso a propiedades de objetos 0|0
        echo 'Nombre: '.$usuario->nombre.'<br>';
        echo 'Apellido: '.$usuario->apellido.'<br>';
        echo 'Dirección: '.$usuario->direccion.'<br>';
        echo 'Ciudad: '.$usuario->ciudad.'<br>';
        echo 'País: '.$usuario->pais.'<br>';
        echo 'Teléfono: '.$usuario->contacto->telefono.'<br>'; //dato anidado
        echo 'Url: '.$usuario->contacto->url.'<br>'; //datos anidado
        echo 'Email: '.$usuario->contacto->email.'<br>';
    }
}
