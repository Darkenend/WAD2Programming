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

    public function eliminarCita(int $idcita) {
        $this->dbh = ConexionBD::conectar();
        $stmt = $this->dbh->prepare('DELETE FROM `citas` WHERE `citas`.`idcita` = :idcita');
        $stmt->bindParam(':idcita', $idcita);
        $stmt->execute();
    }
}
