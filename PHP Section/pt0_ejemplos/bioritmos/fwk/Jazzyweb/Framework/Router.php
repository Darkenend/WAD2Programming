<?php
/**
 * clase Router ubicada en fwk/Jazzyweb/Framework/Router.php
 * La estructura del array de configuración $routes que se pasa como
 * argumento al constructor será la siguiente:
 * array(
 *      'nombre_ruta_1' => array(
 *          'path' => '/path/ruta/1',
 *          'controller' => array(
 *              'class' => 'Controlador_1',
 *              'action' => 'accion_1'
 *          )
 *      ),
 *      ...
 *      'nombre_ruta_N' => array(
 *          'path' => '/path/ruta/N',
 *          'controller' => array(
 *              'class' => 'Controlador_N',
 *              'action' => 'accion_N'
 *          )
 *      )
 * )
 *
 * Y se especificará en la sección routes del archivo de configuración
 */


namespace Jazzyweb\Framework;

class Router {
    
    private $routes;
    
    public function __construct($routes){
        $this->routes = $routes;
    }

    public function getController($path){

        foreach($this->routes as $route){
            if($path === $route['path']){
                if(!method_exists($route['controller']['class'], $route['controller']['action'])){
                    // existe la ruta pero no hay ninguna acción que se ocupe de ella
                    throw new \Exception('El controlador ' . $route['controller']['class']
                                        . ':' . $route['controller']['action'] . ' no existe');
                }

                return $route['controller'];
            
            }
        }
        // La ruta no se ha registrado en la configuración
        throw new \Exception('La ruta ' . $path . ' no existe');
    }

}