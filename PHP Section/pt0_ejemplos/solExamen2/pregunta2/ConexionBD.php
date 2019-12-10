<?php
class ConexionBD {

    // lo suyo sería recoger estas constantes de un fichero 
    // de configuración (XML, ...) fuera del alcance de apache
    // o bien poner esta clase fuera del alcance de apache
    const DSN = 'mysql:dbname=testSeguridad;host=127.0.0.1';
    const USER = 'admin.usuarios';
    const PASSWORD = '123_admin.usuarios_321';
    //PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT en producción
    //Ya que cuando caduca una persistent da un WARNING (MySQL has gone away in PDO::_construct() ...)
    const OPTIONS = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_PERSISTENT => true
    );

    /**
     * Conecta a la BD. Puede lanzar excepciones: debe ir entre un try-catch
     * @return $dbh
     * @throws PDOException
     */
    public static function conectar():PDO {

        $dbh = new PDO(self::DSN, self::USER, self::PASSWORD, self::OPTIONS);
        return $dbh;
       
    }    
}