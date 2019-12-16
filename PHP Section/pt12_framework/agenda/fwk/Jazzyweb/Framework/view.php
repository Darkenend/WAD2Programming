<?php
/**
 * Sirve para calcular correctamente la dirección del asset
 * @param $asset. Ubicación relativa respecto /web ie: bioritmos/my_bior.png
 * @return ruta absoluta del asset. 
 */
function asset($asset){
    $preDir = dirname($_SERVER['SCRIPT_NAME']); //de index.php
    return $preDir. '/' . $asset;
}

/**
 * Sirve para calcular correctamente la ruta
 * @param $ruta. Ie: /, /bioritmo
 * @return ruta absoluta
 */
function url($ruta){
    $preDir = $_SERVER['SCRIPT_NAME']; //de index.php
    return $preDir. $ruta;
}

/* Este código no define ninguna clase. Su cometido es construir la cadena
 * $content a partir de la plantilla y del layout que hayamos definido en el objeto Templating.
 * La clave está en el uso combinado de las funciones ob_start() y ob_get_clean() de PHP.
 * Resulta que tanto las plantillas como los layouts, aunque son ficheros PHP, no comienzan
 * con la etiqueta <?php, por lo que el comportamiento normal del interprete de PHP
 * cuando se incluye uno de estos ficheros es ejecutar los trozos <?php ... ?> y hacer un
 * echo del resultado al dispositivo de salida. Lo que en el entorno del servidor web significa
 * enviar dicho resultado como respuesta.
 * Este no es el comportamiento que deseamos. Con el uso de las funciones ob_start()
 * y ob_get_clean() podemos cambiar este comportamiento:
 *  - La primera, ob_start(), crea un buffer donde se almacena el contenido que se envíe a la salida
 *  - La segunda, ob_get_clean() limpia dicho buffer y como valor de retorno devuelve su contenido
 *    de manera que podemos almacenarlo en una variable.
 * La estrategia consiste en usar dos veces este mecanismo; la primera vez para almacenar el
 * contenido procesado de la plantilla en la variable $templateContent y la segunda para almacenar
 * el contenido del layout el cual hará uso de la variable $templateContent.
 * Además, como este script ha sido incluido desde el método createView() despues de crear las variables
 * a partir del array de parámetros, podremos acceder a dichas variables desde la plantilla.
 */

ob_start();
include $template;
$templateContent = ob_get_clean();

ob_start();
include $layout;
$content = ob_get_clean();
