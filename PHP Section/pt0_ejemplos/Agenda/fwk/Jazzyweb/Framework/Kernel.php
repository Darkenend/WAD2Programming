<?php
/**
 * La clase Kernel es la encargada de dar cohesión a todos los elementos del framework.
 * Carga la configuración, decide qué hacer con la Request para convertirla en Response
 * y devuelve esta última al cliente.
 * Colocaremos el código de esta clase en el archivo fwk/Jazzyweb/Framework/Kernel.php
 */
namespace Jazzyweb\Framework;

class Kernel {
    private $config;
    
    public function __construct($config){
        $this->config = $config;
    }

    /**
     *  método handle(), encargada de manipular la petición y de transformarla
     *  en una respuesta. El método handle se apoya en la clase Router,
     *  la cual asocia a cada path (ruta) de la URL un método, que se denomina acción,
     *  de una clase, denominada controlador. Esta acción es la que implementa la
     *  funcionalidad solicitada en la URL, y ya NO forma parte del framework;
     *  se trata de código propio de la aplicación.
     */
    public function handle($request){
        
        //crea un objeto router a partir de las rutas de la configuración
        $router = new Router($this->config['routes']);
        
        //obtiene el path de la petición actual
        $path = $request->getPath();
        
        //obtiene el controlador adecuado para dicho path
        //el controlador es un array asociativo con el nombre de la clase y el método(acción)
        $controlador = $router->getController($path);
        
        //invoca la acción resuelta por el objeto router con los parámetros que contiene request
        //este método establece la conexión entre el framework y la aplicación
        $response = $this->buildResponse($controlador, $request);
        
        return $response;
    }

    private function buildResponse($controlador, $request){
        return call_user_func(array(new $controlador['class'], $controlador['action']), $request);
    }
    
    /**
     * Los objetos de esta clase son construidos a partir de un array
     * que contiene la configuración del framework. -- La estructura de
     * dicho array y la información que contiene debe ser especificada en la
     * documentación del framework --*. La función estática loadConfig() hace posible
     * crear un array de configuración a partir de un archivo.
     * La idea es desacoplar la configuración para trabajar en entorno servidor
     */
    public static function loadConfig($configFile){
        $config = array();
        include($configFile); //*necesariamente incluye instrucciones para manipular el array
        return $config;
    }

}
