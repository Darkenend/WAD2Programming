<?php
/**
 *  implementación de la petición (request), que colocaremos en el archivo
 *  fwk/Jazzyweb/Framework/Request.php. Esta estructura de directorios viene
 *  determinada por el espacio de nombre al que pertenece la clase que, a su vez,
 *  es un reflejo de la manera en que vamos a organizar el código según las normas
 *  del PSR-0. Jazzyweb es el nombre del vendor, es decir, del desarrollador de la
 *  clase. Framework simplemente indica que las clases y subespacios de
 *  nombre que cuelguen de él forman parte del componente framework.
 */

namespace Jazzyweb\Framework;

class Request {
    private $request;
    private $files;
    private $server;
    
    // Constructor 1: desacopla superglobales para test phpunit (CLI)
    public function __construct($request, $files, $server){
        $this->request = $request;
        $this->files = $files;
        $this->server = $server;
    }
    
    // Recuperar los atributos que se han pasado  por GET o POST en la petición http
    public function get($name){
        if(!isset($this->request[$name])){
            // \Exception?: la del espacio de nombres de PHP
            throw new \Exception('El parámetro ' . $name . ' no se encuentra en la request');
        }

        return $this->request[$name];
    }
    // en la petición http://tu.servidor/index.php/usuario/juanda
    // devuelve la ruta:usuario/juanda (derecha controlador frontal)
    public function getPath(){
        $path = (isset($this->server['PATH_INFO']))? $this->server['PATH_INFO'] : '/';
        return $path;    
    }

    //Constructor 2: desacopla de las superglobales para usar en entorno servidor
    public static function createFromGlobals(){
        return new static($_REQUEST, $_FILES, $_SERVER);
    }
}