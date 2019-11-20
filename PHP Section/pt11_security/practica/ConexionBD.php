<?php

class ConexionBD
{

    // lo suyo sería recoger estas constantes de un fichero
    // de configuración (XML, ...) fuera del alcance de apache
    // o bien poner esta clase fuera del alcance de apache
    const DSN = 'mysql:dbname=testSeguridad;host=127.0.0.1';
    const USER = 'darkenend';
    const PASSWORD = 'Twoseven3';

    //PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT en producción
    const OPTIONS = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_PERSISTENT => true
    );

    /**
     * Crea la conexion a la base de datos
     * @return PDO $dbh Conexion a la base de datos
     * @throws PDOException Excepcion lanzada en caso de error
     */
    public static function conectar(): PDO
    {
        try {
            $dbh = new PDO(self::DSN, self::USER, self::PASSWORD, self::OPTIONS);
            echo "<script>console.log('Conexion realizada con exito')</script>";
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
