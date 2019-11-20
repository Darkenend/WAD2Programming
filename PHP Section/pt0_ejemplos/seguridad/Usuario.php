<?php
// parámetros de conexión a la BD
require 'ConexionBD.php';

class Usuario {

    // Opciones de contraseña:
    const HASH = PASSWORD_DEFAULT;
    const COST = 14;
    
    // Almacenamiento de datos del usuario:
    private $data;

    /**
     * Guarda en $data los datos correspondientes a ese usuario
     * @param $usuario se usa para buscar la entrada en la tabla de usuarios
     * Si no no se puede conectar o no hay ningún usuario con ese nombre en $data->valido = false;
     * Si hay un usuario con ese nombre $data->usuario y $data->passwordHash se obtienen de la DB;
     */
    public function __construct($usuario) {


        try {

            //para evitar E_WARNING: a partir de PHP 5.4 no dejar crear objetos "al vuelo";
            if(!is_object($this->data)) {
                $this->data = new stdClass;
            }

            //No ha podido conectar
            $this->data->valido = false;
            $dbh = ConexionBD::conectar();
            $this->data->valido = true;

            $stmt = $dbh->prepare("select passwordHash from usuarios where usuario = :usuario");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();

            //No está el usuario en la BD
            if ($stmt->rowCount() === 0) {
                $this->data->valido = false;
            } else { //forzosamente 1 pq usuario es clave
                $this->data->usuario = $usuario;
                $row = $stmt->fetch();
                $this->data->passwordHash = $row['passwordHash'];
            }

        } catch (PDOException $e) {
                echo 'Error con la base de datos: ' . $e->getMessage() . '<br>';
        } finally {
            if (isset($dbh)) {
                $dbh = null;
            }
        }

    }

    /**
     * getter de $data->valido
     * @return $data->valido
     */
    public function getValido():bool {
        return $this->data->valido;
    } 

    /**
     * Guarda una actualización (rehashing) de la contraseña
     * Llamada por login
     */
    private function save() {

        try {

            $dbh = ConexionBD::conectar();
            $stmt = $dbh->prepare("update usuarios set passwordHash = {$this->data->passwordHash} 
            where usuario = {$this->data->usuario}");

            $stmt->execute();

        } catch (PDOException $e) {
                echo 'Error con la base de datos: ' . $e->getMessage() . '<br>';
        } finally {
            if (isset($dbh)) {
                $dbh = null;
            }
        }
    }

    /**
     * Hace rehash
     * @param $contraseña a la que se le hace el rehashing
     */
    private function setPassword($contraseña) {
        $this->data->passwordHash = password_hash($contraseña, self::HASH, ['cost' => self::COST]);
    }


    /**
     * Compara la contraseña que ha dado el usuario con la de la BBDD
     * @param string. Contraseña en texto plano
     * @return bool. True o éxito / False o fallo de credencial
     */
    public function login(string $contraseña):bool {

        // No existe -> indicado por el constructor
        if (!$this->data->valido) return false;

        // Primero comprobamos si se ha empleado una contraseña correcta:
        if (password_verify($contraseña, $this->data->passwordHash)) {
            // Exito, ahora se comprueba si la contraseña necesita un rehash:
            if (password_needs_rehash($this->data->passwordHash, self::HASH, ['cost' => self::COST])) {
                // Tenemos que hacer rehash en la contraseña y guardarla. Simplemente se llama a setPassword():
                $this->setPassword($contraseña);
                $this->save();
            }
            return true; // O hacer lo necesario para indicar que el usuario se ha logeado.
        }
        return false;
    }

    /**
     * Función que crea un usuario y lo guarda en la BBDD
     * @param $usuario. Nombre del usuario
     * @param $contraseña. Contraseña en texto plano
     */
    public static function crearUsuario(string $usuario, string $contraseña) {

        try {

            $dbh = ConexionBD::conectar();
            $stmt = $dbh->prepare("insert into usuarios(usuario, passwordHash) 
            values(:usuario, :passwordHash)");
            
            //Hashing
            $passwordHash = password_hash($contraseña, self::HASH, ['cost' => self::COST]);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':passwordHash', $passwordHash);
            $stmt->execute();

        } catch (PDOException $e) {
                echo 'Error con la base de datos: ' . $e->getMessage() . '<br>';
        } finally {
            if (isset($dbh)) {
                $dbh = null;
            }
        }  
    }

}

function comprobarUsuario($nombre, $clave) {
    $usuario = new Usuario($nombre);
    //Caso de no poder conectar a la BBDD
    if (!$usuario->getValido()) return false;
    return $usuario->login($clave);
}