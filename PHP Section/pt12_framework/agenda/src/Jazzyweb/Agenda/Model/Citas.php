<?php

namespace Jazzyweb\Agenda\Model;

/**
 * Clase que maneja todo lo correspondiente a la BD agenda
 * Ofrece métodos con las distintas operaciones sobre la BD agenda
 * La idea es que devuelva los datos crudos al Controller:
 * arrays obtenidos a partir de los diferentes recordsets de
 * manera que el controlador no esté acoplado con la BD
 */
class Citas {

    // Handler de la BD
    private $dbh;

    // El constructor crea una conexión permanente a la BD
    public function __construct() {
        $this->dbh = ConexionBD::conectar();
    }

    /**
     * Retorna el número de citas para una fecha dada
     * @param string $fecha 'YYYY-MM-DD'
     * @return int
     */
    public function numeroCitas(string $fecha):int {

        //reciclar conexión
        $this->dbh = ConexionBD::conectar();
        //preparar
        $stmt = $this->dbh->prepare(
            'select count(*) as cantidad
            from citas 
            where diacita = :fecha'
        );
        //enlazar
        $stmt->bindParam(':fecha', $fecha);
        //ejecutar
        $stmt->execute();
        //solo devuelve un resultado
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['cantidad'];
    }

    /**
     * Retorna una tabla con filas numéricas y columnas asociativas
     * @param string $fecha. AAAA-MM-DD
     * @return array[] matriz 
     */  
    public function obtenerCitas(string $fecha):array {
        //reciclar conexión
        $this->dbh = ConexionBD::conectar();
        //preparar
        $stmt = $this->dbh->prepare(
            'select *
            from citas
            where diacita = :fecha
            order by horacita asc'
        );
        
        //enlazar
        $stmt->bindParam(':fecha', $fecha);
        //ejecutar
        $stmt->execute();
        
        //recoger recordset
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        //Montar tabla para devolver
        $tabla = array();
        $i = 0;
        foreach ($result as $row) {
            $tabla[$i] = $row;
            $i++;
        }
        /*
        For debug purposes:
        var_dump($tabla);
        */
        return ($tabla);
    }

    /**
     * Esta funcion se encarga de eliminar una cita de la base de datos
     * @param integer $idcita ID de la cita que se va a eliminar
     */
    public function eliminarCita(int $idcita) {
        $this->dbh = ConexionBD::conectar();
        $stmt = $this->dbh->prepare('DELETE FROM `citas` WHERE `citas`.`idcita` = :idcita');
        $stmt->bindParam(':idcita', $idcita);
        $stmt->execute();
    }

    /**
     * Esta funcion modifica una cita en la base de datos
     * @param integer $idcita ID de la cita que se va a modificar
     * @param string $fecha Fecha nueva de la cita, se deberia de tomar de
     * un formulario o bien insertar en formato d/m/Y (formato PHP)
     * @param string $hora Hora nueva de la cita, se deberia de tomar de un formulario
     * @param string $asunto Nuevo asunto de la cita, es un string normal y corriente
     */
    public function modCita(int $idcita, string $fecha, string $hora, string $asunto) {
        $string_building = str_replace('/', '-', $fecha);
        $fechaProcessed = date('Y-m-d', strtotime($string_building));
        $this->dbh = ConexionBD::conectar();
        $stmt = $this->dbh->prepare('UPDATE `citas` SET `horacita` = :hora, `diacita` = :fecha, `asuntocita` = :asunto WHERE `citas`.`idcita` = :idcita');
        $stmt->bindParam(':idcita', $idcita);
        $stmt->bindParam(':fecha', $fechaProcessed);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->execute();
    }

    /**
     * Esta funcion crea una nueva cita en la base de datos
     * @param string $fecha Fecha nueva de la cita, se deberia de tomar de
     * un formulario o bien insertar en formato d/m/Y (formato PHP)
     * @param string $hora Hora nueva de la cita, se deberia de tomar de un formulario
     * @param string $asunto Nuevo asunto de la cita, es un string normal y corriente
     */
    public function creacionCita(string $fecha, string $hora, string $asunto) {
        $string_building = str_replace('/', '-', $fecha);
        $fechaProcessed = date('Y-m-d', strtotime($string_building));
        $this->dbh = ConexionBD::conectar();
        $stmt = $this->dbh->prepare("INSERT INTO `citas` (`idcita`, `horacita`, `diacita`, `asuntocita`) VALUES (NULL, :hora, :fecha, :asunto)");
        $stmt->bindParam(':fecha', $fechaProcessed);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->execute();
    }
}
