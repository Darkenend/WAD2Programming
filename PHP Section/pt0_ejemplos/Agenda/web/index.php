<?php
/** Controlador frontal **/

//autocarga de clases
include(__DIR__."/../app/autoload.php");

use Jazzyweb\Framework\Kernel;
use Jazzyweb\Framework\Request;

//carga la configuración de la aplicación en el array $config
$config = Kernel::loadConfig(__DIR__."/../app/config.php");

//se crea el objeto $kernel que encapsula el ciclo petición-respuesta del protocolo http
$kernel = new Kernel($config);

//se crea el objeto $request que encapsula los datos relacionados con la petición
$request = Request::createFromGlobals();

//el kernel maneja una petición y genera una respuesta
$response = $kernel->handle($request);

//se envía la respuesta al cliente
$response->send();