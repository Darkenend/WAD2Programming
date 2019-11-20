<?php
require 'ConexionBD.php';
require 'Password.php';

class Usuario
{

    // Opciones de contraseña:
    const HASH = PASSWORD_DEFAULT;
    const COST = 14;
    // Almacenamiento de datos del usuario:
    private $data;

    /**
     * Guarda en $data los datos correspondientes a ese usuario
     * @param $usuario se usa para buscar la entrada en la tabla de usuarios
     * Si no se puede conectar o no hay ningún usuario con ese nombre
     * en $data->valido = false;
     * Si hay un usuario con ese nombre $data->usuario y $data→passwordHash
     * se obtienen de la DB;
     */
    public function __construct($usuario)
    {
        try {
            if (!is_object($this->data)) {
                $this->data = new stdClass;
            }
            $this->data->valido = false;
            $dbh = ConexionBD::conectar();
            $str_sta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
            $statement = $dbh->query($str_sta);
            if ($statement->rowCount() === 0) {
                $this->data->valido = false;
            } else {
                $this->data->usuario = $usuario;
                $row = $statement->fetch();
                $this->data->passwordHash = $row['passwordHash'];
            }
        } catch (PDOException $e) {
            echo "Error en el Constructor:<br>".$e->getMessage();
        } finally {
            if (isset($dbh)) {
                $dbh = null;
            }
        }
    }

    /**
     * Función que crea un usuario y lo guarda en la BBDD
     * @param string $usuario . Nombre del usuario
     * @param string $contraseña . Contraseña en texto plano
     */
    public static function crearUsuario(string $usuario, string $contraseña)
    {
        try {
            $hash = Password::hash($contraseña, self::COST);
            while (!Password::verify($contraseña, $hash)) {
                $hash = Password::hash($contraseña, self::COST);
            }
            $dbh = ConexionBD::conectar();
            $statement = $dbh->prepare("INSERT INTO `usuarios`(`usuario`, `passwordHash`) VALUES (:usuario, :passwordHash)");
            $statement->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $statement->bindParam(':passwordHash', $hash, PDO::PARAM_STR);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error en la conexion a la base de datos:<br>";
        } finally {
            if (isset($dbh)) {
                $dbh = null;
            }
        }
    }

    /**
     * getter de $data->valido
     * @return bool $data->valido
     */
    public function getValido(): bool
    {
        return $this->data->valido;
    }

    /**
     * Logs in a user
     * @param string $contraseña Password of the user
     * @return bool Success or failure in user log in
     */
    public function login(string $contraseña): bool
    {
        if (Password::verify($contraseña, $this->data->passwordHash)) {
            $login = true;
            if (password_needs_rehash($this->data->passwordHash, self::HASH, self::COST)) {
                $this->setPassword($contraseña);
                $this->save();
            }
        }
        return $login;
    }

    /**
     * Guarda una actualización (rehashing) de la contraseña llamada por login
     */
    private function save()
    {
        try {
            $dbh = ConexionBD::conectar();
            $stmt = $dbh->prepare("UPDATE `usuarios` SET `passwordHash`=($this->data->passwordHash) WHERE `usuario`=($this->data->usuario)");
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar la base de datos:<br>".$e->getMessage();
        } finally {
            if (isset($dbh)) {
                $dbh = null;
            }
        }
    }

    /**
     * Hace rehash
     * @param $contraseña Hash que se le hace el rehashing
     */
    private function setPassword($contraseña)
    {
        $this->data->passwordHash = Password::hash($contraseña, self::HASH);
    }
}
