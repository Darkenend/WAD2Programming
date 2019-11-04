<?php
/* Formato nowdoc para olvidarme comillas */
$texto = <<< 'listado'
Apellidos,Nombre,DNI,Repetidor,Teléfono;
López Ramírez,Juan,11111111-A,No,965555555;
Benedicto Pérez,Pablo,2222222-B,Si;
García Pérez,Víctor Manuel,33333333-F,No;
Moreno, Mario "Cantinflas",--,No,965874123;
Dell'atte,Elena,23423422-C,Si,236546548
listado;
/* Primera separación del texto, las cabeceras por
 * un lado y los datos por otro */
$separarCabeceras = explode(";", $texto, 2);
$campos = explode(",", $separarCabeceras[0]);
/* Array indexado de strings con la información de
 * cada persona. Cada posición del array es una persona
 * diferente */
$personasSinProcesar = explode(";", $separarCabeceras[1]);
// Array bidimensional
$dim = [];
//Se recorren las personas una por una
foreach($personasSinProcesar as $persona) {
    // persona(STRING) -> persona(ARRAY)
    $persona = explode(",", $persona);
    // Array asociativo con los datos de persona
    $personaProcesada = [];
    // De $campos obtenemos el índice asociativo
    // De $persona los datos
    foreach($persona as $indice=>$valor) {
        $personaProcesada[$campos[$indice]] = $valor;
    }
    //Guardamos la persona procesada
    $dim[] = $personaProcesada;  
}
// Salida html
echo '<ul>';
foreach($dim as $persona) {
    foreach ($persona as $clave=>$valor) {
        echo "<li> $clave: $valor </li>";
    }
    echo '<br>';
}
echo '</ul>'
?>