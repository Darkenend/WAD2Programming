<?php
/**
 * La idea general es la de disponer de un objeto Templating al que le podamos decir:
 *  - Cual es la plantilla que deseamos usar
 *  - qué variables le vamos a pasar a dicha plantilla para que se pinte (renderize)
 *  - que layout vamos a decorarla.
 * Con esos elementos el objeto Templating debe ser capaz de construir una cadena
 * con el contenido que servirá para construir el objeto Response que cada acción
 * necesita para devolver al framework.
 * Como el objeto Templating que proponemos puede ser utilizado por cualquier acción
 * de cualquier aplicación, colocaremos la clase que lo define en la parte del framework,
 * a la que llamaremos \Jazzyweb\Framework\Templating. Este es el código ubicado en
 * fwk/Jazzyweb/Framework/Templating.php.
 */

namespace Jazzyweb\Framework;

class Templating {
    
    private $layout;
    
    public function setLayout($layout){
        if(!file_exists($layout)){
            throw new \Exception('El layout ' . $layout . ' no existe');
        }

        $this->layout = $layout;
    }
    
    public function createView($template, $params = null ){        
        if(!file_exists($template)){
            throw new \Exception('El template ' . $template . ' no existe');
        }
        
        $layout = $this->layout;
        if(!isset($layout) || !$layout){
            throw new \Exception('Debes definir un layout. Usa setLayout');
        }

        /*
         * PHP $$var uses the value of the variable whose name is the value of $var.
         * It means $$var is known as reference variable where as $var is normal variable.
         * It allows you to have a "variable's variable" - the program can create the
         * variable name the same way it can create any other string
         */
        if(isset($params)){
            foreach($params as $key => $value){
                //En Español: crea un conjunto de variables cuyo nombre es el del índice asociativo ($key)
                // y cuyo valor es el de $value
                // Uso: $params dentro de las acciones y las variables sueltas en la plantilla
                $$key = $value;
            }
        }

        $content = '';
        
        // ... más magia ...
        include __DIR__ . '/view.php';
        // ... renderizado en $content!
        return $content;
    
    }
}