<?php
/**
 * función mágica que se llama cuando se carga una clase por primera vez.
 * Esta función no forma parte del intérprete PHP y debe ser facilitada por el programador
 * El resultado es que si se encuentra la clase donde debe estar se incluye automáticamente
 * @param nombre completamente cualificado de la clase. ie: Jazzyweb\Framework\Kernel
 */

function __autoload($className){
    $className = ltrim($className, '\\'); //quita la primera '\'
    $fileName = ''; //cadena que contendrá el nombre completo del fichero
    
    //Directorios de búsqueda de los archivos de las clases -> respecto a la ubicación de autoload
    $dirSrc = array(__DIR__.'/../src', __DIR__.'/../fwk');
    
    $namespace = ''; //cadena que contendrá el espacio de nombres de la clase
    
    if ($lastNsPos = strrpos($className, '\\')) { //guardamos la posición de la última '\';
        $namespace = substr($className, 0, $lastNsPos); //guardamos el espacio de nombres de la clase sin el '\' del final
        $className = substr($className, $lastNsPos + 1); //guardamos ahora solo el nombre de la clase $className = 'Kernel'
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR; //$fileName = 'Jazzyweb/Framework/'
    } //si no entra quiere decir que está arriba en el espacio de nombres y $namespace = ''
    
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php'; // $fileName = 'Jazzyweb/Framework/Kernel.php'

    foreach($dirSrc as $dir){
        $f = $dir . DIRECTORY_SEPARATOR . $fileName; //monta la ruta real respecto a la ubicación del script autoload
        if(file_exists($f)){ //si existe el fichero de la clase lo incluye
            //echo $f . '->incluido<br>';
            require $f;
            break;
        } //else echo $f . '-> No incluido<br>';
    }
}