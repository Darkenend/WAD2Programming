<?php
/**
 * El código de la clase \Jazzyweb\Agenda\Controller\DefaultController se ubica en
 * src/Jazzyweb/Agenda/Controller/DefaultController.php.
 */
namespace Jazzyweb\Agenda\Controller;
use Jazzyweb\Framework\Kernel;
use Jazzyweb\Framework\Response;
use Jazzyweb\Agenda\Model\Citas;
use Jazzyweb\Framework\Templating;


class DefaultController {

    /**
     * muestra pantalla de bienvenida y formulario de login
     */
    public function login($request) {
        $templating = new Templating();
        $templating->setLayout(__DIR__ . '/../Views/layout.php');
        $params = array('errorLogin' => 'Introduzca usuario y contraseña');
        $html = $templating->createView(__DIR__ . '/../Views/Default/login.php', $params);
        $response = new Response($html);
        return $response;
    }

    /**
     * Valida las credenciales del usuario.
     * Si el usuario es inválido muestra login de nuevo informando del error
     * Si el usuario es válido:
     *      1. Inicia sesión y guarda el ticket en $_SESSION['usuario']
     *      2. redirige a /agenda
     */
    public function validar($request) {
        if ($request->getServer('REQUEST_METHOD') === 'POST') {
            $usu = $this->comprobarUsuario($request->get('usuario'), $request->get('password'));
            if ($usu === false) {
                $templating = new Templating();
                $templating->setLayout(__DIR__ . '/../Views/layout.php');
                $params = array(
                    'errorLogin' => 'Revise nombre de usuario y contraseña'
                );
                $html = $templating->createView(__DIR__ . '/../Views/Default/login.php', $params);
                $response = new Response($html);
                return $response;    
            } else {
                session_start();
                $_SESSION['usuario'] = $request->get('usuario');
                
                $response = new Response(); 
                $response->addHeader('Location: ' . $request->getServer('SCRIPT_NAME') . '/agenda');
                return $response;
            }
        }
    }

    /**
     * Comprueba que existe el usuario y la clave en la sección de usuarios de config.php
     * @return Array con nombre de usuario. False en caso contrario. 
     */
    private function comprobarUsuario(string $nombre, string $clave) {
        //cargo fichero configuración para ver usuarios
        $config = Kernel::loadConfig(   __DIR__ . '/../../../../app/config.php');
        if (array_key_exists($nombre, $config['users'])) {
            if ($clave === $config['users'][$nombre]['password']) {
                $usu['nombre'] = $nombre;
                return $usu;
            } 
        }
        return false;
    }
    
    /**
     * Página principal de la aplicación 
     * Muestra un menú y un formulario
     */
    public function agenda($request){
        //Este bloque se usa al principio de todas las acciones de la aplicación
        //se comprueba que se haya accedido mediante login
        session_start();
        if (!isset($_SESSION['usuario'])) {
            $response = new Response(); 
            $response->addHeader('Location: ' . $request->getServer('SCRIPT_NAME') . '/');
            return $response;
        }
        //vector de parámetros para la plantilla
        $params = array(
            'menu' => '<a href="' . $request->getServer("SCRIPT_NAME") . '/logout">logout</a>',
            'fecha' => '',
            'nCitas' => '',
            'citas' => '' //cadena HTML con todas las citas
        );
        //cálculo de la fecha
        if ($request->getServer('REQUEST_METHOD') === 'POST') {
            //Hay un POST del formulario cambiarFecha
            if ($request->exists('fecha')) {
                $params['fecha'] = $request->get('fecha');
            //Hay un POST que no tiene que ver
            } else {
                $params['fecha'] = (new \DateTime())->format('Y-m-d');
            }
        } else { //fecha actual por defecto
            $params['fecha'] = (new \DateTime())->format('Y-m-d');
        }
        //cálculo del número de citas para la fecha
        $citas = new Citas();
        $params['nCitas'] = $citas->numeroCitas($params['fecha']);
        //obtención de las citas para la fecha
        if ($params['nCitas'] > 0) {
            $params['citas'] = $this->obtenerTablaCitas($params['fecha']); 
        }
        $templating = new Templating();
        $templating->setLayout(__DIR__ . '/../Views/layout.php');
        $html = $templating->createView(__DIR__ . '/../Views/Default/agenda.php', $params);
        $response = new Response($html);
        return $response;
    }
    /**
     * Genera una cadena HTML donde van las citas asociadas a una fecha:
     *      - añade un radio por fila para seleccionar
     *      - al final añade botones para modificar y borrar filas checkeadas.
     * @param string $fecha. AAAA-MM-DD
     * @return string HTML
     */
    private function obtenerTablaCitas(string $fecha):string {
        $citas = new Citas();
        $tablaCitas = $citas->obtenerCitas($fecha);
        $str = '<input type="hidden" name="fechaEnCurso" value="' . $fecha . '">' . PHP_EOL. '<br>';
        $str .= '<table>' . PHP_EOL;
        $str .= '<tr><th>hora</th><th>asunto</th><th>seleccionada</th></tr>' . PHP_EOL;
        foreach($tablaCitas as $cita) {
            $str .= '<tr>';
            $str .= '<td>' . $cita['horacita'] . '</td>';
            $str .= '<td>' . $cita['asuntocita'] . '</td>';
            $str .= '<td><input type="radio" name="citaSeleccionada" value="' . $cita['idcita'] . '"></td>';  
            $str .= '</tr>' . PHP_EOL;
        }
        $str .= '</table>';
        $str .= '<input name="borrarCita" type="submit" value="Eliminar cita">';
        $str .= '<input name="cambiarCita" type="submit" value="Modificar cita">' . PHP_EOL. '<br>'; 
        return $str;
    }

    /**
     * logout de la aplicación
     * cierra la sesión y redirige a la pantalla de login
     */
    public function logout($request) {
        session_start(); //unirse a la sesión
        $_SESSION = array();
        session_destroy(); //eliminar la sesión
        setcookie(session_name(), "123", time() - 1000); //eliminar la cookie
        $response = new Response(); 
        $response->addHeader('Location: ' . $request->getServer('SCRIPT_NAME') . '/');
        return $response;
    }

    /**
     * método correspondiente a cambiarCita -> detecta si se ha pulsado
     * el botón "cambiarCita" o "borrarCita" y redirige a las rutas correspondientes
     * pero se necesita la información de $request. Deberemos usar `$_SESSION` ya que
     * al hacer un Header('Location: ') se pierde la información de $request
     * 
     * Para ver si se ha hecho un submit de un botón u otro:
     * `isset($_POST['borrarCita'])`
     * `isset($_POST['cambiarCita'])`
     * 
     * IMPORTANTE: por no complicar el código es mejor comprobar por JS
     * si hay un radio activado: 
     * si hay uno activado -> que se activen los botones de cambiar o borrar
     * si no hay ninguno -> que se desactiven
     */
    public function cambiarCita($request) {
        //se comprueba que se haya accedido mediante login
        session_start();
        if (!isset($_SESSION['usuario'])) {
            $response = new Response(); 
            $response->addHeader('Location: ' . $request->getServer('SCRIPT_NAME') . '/');
            return $response;
        }
        //pongo las cosas importantes en $_SESSION
        $_SESSION['idCita'] = $request->get('citaSeleccionada');
        if ($request->exists('borrarCita')){
            $response = new Response();
            $response->addHeader('Location: ' . $request->getServer('SCRIPT_NAME') . '/borrarCita');
        }
        if ($request->exists('cambiarCita')) {
            $response = new Response();
            $response->addHeader('Location: ' . $request->getServer('SCRIPT_NAME') . '/modificarCita');
        }
        return $response;
    }

    /**
     * Borra la cita cuyo id está en `$_SESSION['idCita']` (Al acabar se limpia ya que es global)
     * 
     * TODO: Implement Date deletion.
     */
    public function borrarCita($request) {
        //se comprueba que se haya accedido mediante login
        session_start();
        if (!isset($_SESSION['usuario'])) {
            $response = new Response(); 
            $response->addHeader('Location: ' . $request->getServer('SCRIPT_NAME') . '/');
            return $response;
        }
        $citas = new Citas();
        $citas->eliminarCita($_SESSION['idCita']);
        $menu = '<a href="' . $request->getServer("SCRIPT_NAME") . '/logout">logout</a>';
        $menu .= '&nbsp;';
        $menu .= '<a href="' . $request->getServer("SCRIPT_NAME") . '/agenda">agenda</a>';
        $params = array(
            'menu' => $menu
        );
        $templating = new Templating();
        $templating->setLayout(__DIR__ . '/../Views/layout.php');
        $html = $templating->createView(__DIR__ . '/../Views/Default/borrar.php', $params);
        $response = new Response($html);
        return $response;
    }

    /**
     * Modifica la cita cuyo id está en `$_SESSION['idCita']` (Al acabar se limpia ya que es global)
     * 
     * TODO: Implement Date modification.
     */
    public function modificarCita($request) {
        //se comprueba que se haya accedido mediante login
        session_start();
        if (!isset($_SESSION['usuario'])) {
            $response = new Response(); 
            $response->addHeader('Location: ' . $request->getServer('SCRIPT_NAME') . '/');
            return $response;
        }
        $menu = '<a href="' . $request->getServer("SCRIPT_NAME") . '/logout">logout</a>';
        $menu .= '&nbsp;';
        $menu .= '<a href="' . $request->getServer("SCRIPT_NAME") . '/agenda">agenda</a>';
        $params = array(
            'menu' => $menu
        );
        $templating = new Templating();
        $templating->setLayout(__DIR__ . '/../Views/layout.php');
        
        $html = $templating->createView(__DIR__ . '/../Views/Default/modificar.php', $params);
        $response = new Response($html);
        return $response;
    }
}