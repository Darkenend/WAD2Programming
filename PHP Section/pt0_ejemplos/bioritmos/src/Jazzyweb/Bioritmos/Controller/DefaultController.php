<?php
/**
 * El código de la clase \Jazzyweb\Bioritmos\Controller\DefaultController se ubica en
 * src/Jazzyweb/Bioritmos/Controller/DefaultController.php.
 */
namespace Jazzyweb\Bioritmos\Controller;
use Jazzyweb\Framework\Response;
use Jazzyweb\Bioritmos\Model\Bioritmos;
use Jazzyweb\Framework\Templating;


class DefaultController{
    /*
    public function index($request){
        $response = new Response();
        $contenido = '<html><body><h1>INDEX</h1></body></html>';
        $response->setContent($contenido);
        return $response;
    }
    */
    
    public function index($request){
        $templating = new Templating();
        $templating->setLayout(__DIR__ . '/../Views/layout.php');
        $html = $templating->createView(__DIR__ . '/../Views/Default/index.php');
        $response = new Response($html);
        return $response;
}


    /*
    public function bioritmo($request){
        $fechaNacimiento = $request->get('fechaN');
        $bior = new Bioritmos($fechaNacimiento);
        //Guarda el fichero en la carpeta que indiquemos
        $bior->DrawBior(__DIR__.'/../../../../web/bioritmos/my_bior.png');
        $imgSrc = dirname($_SERVER['SCRIPT_NAME']).'/bioritmos/my_bior.png';
        $contenido = "<html><body><img src='$imgSrc'/></body></html>";
        $response = new Response();
        $response->setContent($contenido);
        return $response;
    }*/
    /*
    public function bioritmo($request){
        
        $fechaNacimiento = $request->get('fechaN');
        $bior = new Bioritmos($fechaNacimiento);
        $bior->DrawBior(__DIR__.'/../../../../web/bioritmos/my_bior.png');
        $templating = new Templating();
        $templating->setLayout(__DIR__ . '/../Views/layoutBasic.php');
        $html = $templating->createView(__DIR__ . '/../Views/Default/bioritmo.php', array('file' => 'bioritmos/my_bior.png'));
        $response = new Response($html);
        return $response;
    
    }
    */
    public function bioritmo($request){
        
        $fechaNacimiento = $request->get('fechaN');
        $bior = new Bioritmos($fechaNacimiento);
        $bior->DrawBior(__DIR__.'/../../../../web/bioritmos/my_bior.png');
        $templating = new Templating();
        $templating->setLayout(__DIR__ . '/../Views/layout.php');
        $html = $templating->createView(__DIR__ . '/../Views/Default/bioritmo.php', array('file' => 'bioritmos/my_bior.png'));
        $response = new Response($html);
        return $response;
    
    }


}