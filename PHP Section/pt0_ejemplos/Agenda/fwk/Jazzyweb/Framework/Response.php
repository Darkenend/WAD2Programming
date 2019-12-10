<?php
/**
 * La clase Response. La colocaremos en el archivo
 * fwk/Jazzyweb/Framework/Response.php. Pertenece, por tanto, al
 * espacio de nombres Jazzyweb\Framework.
 */
namespace Jazzyweb\Framework;

/**
 * Una respuesta HTTP consta de:
 *  - una cabecera con unos campos (headers): info de tipo de contenido que se envía,
 *    valor de la cookie que debe enviar el cliente en cada petición,
 *    el tiempo de validez de la cookie, información para el caching de páginas (los proxies y navegador),
 *    ...
 *  - un contenido: fichero HTML, XML, JSON, texto plano, un fichero comprimido o cualquier otro engendro.
 */

class Response {
    private $headers;
    private $content;

    public function __construct($content = null){
        $this->headers = array();
        $this->content = $content;
    }
    // Añade cabecera al array de cabeceras
    public function addHeader($header){
        $this->headers[] = $header;
    }
    
    // Establece el contenido
    public function setContent($content){
        $this->content = $content;
    }

    // Envía la respuesta
    public function send(){
        // Primero las cabeceras
        foreach($this->headers as $header){
            header($header);
        }
        
        // Segundo el contenido
        echo $this->content;
    }

}