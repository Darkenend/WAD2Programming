<?php
require_once 'ConexionBD.php';
/**
  * Clase que implementa un rainbow md5 para 3 o menos letras de tamaño
  * Solo trabaja contraseñas con letras en minúsculas combinadas con números
  */
class Rainbow {
    const CARACTERES = array("0","1","2","3","4","5","6","7","8","9",
                    "a","b","c","d","e","f","g","h","i","j",
                    "k","l","m","n","o","p","q","r","s","t",
                    "u","v","w","x","y","z");
    
    private $dbh;                
    
    public function __construct() {
        $this->dbh = ConexionBD::conectar();
    }

    public function rainbow3() {
        $tamaño = count(self::CARACTERES);
        $letras = self::CARACTERES;

        //reusar conexión permanente
        $this->dbh = ConexionBD::conectar();

        //preparar
        $stmt = $this->dbh->prepare(
            'insert into rainbow
            values(:hash, :password)');

        //declaro variables
        $hash = '';
        $password = '';

        //bindParam
        $stmt->bindParam(':hash', $hash);
        $stmt->bindParam(':password', $password);

        //1letra
        for ($i = 0; $i < $tamaño; $i++) {
            $hash =  md5($letras[$i]);
            $password = $letras[$i];
            //Añadir a la BD
            $stmt->execute();
        }
        echo 'rainbow-1letra' . '<br>';

        //2letras
        for ($i = 0; $i < $tamaño; $i++) 
            for ($j = 0; $j < $tamaño; $j++) {
                    $hash =  md5($letras[$i].$letras[$j]);
                    $password = $letras[$i].$letras[$j];
                    //Añadir a la BD
                    $stmt->execute();
        }
        echo 'rainbow-2letras' . '<br>';

        //3letras
        for ($i = 0; $i < $tamaño; $i++) 
            for ($j = 0; $j < $tamaño; $j++)
                for ($k = 0; $k < $tamaño; $k++) {
                    $hash =  md5($letras[$i].$letras[$j].$letras[$k]);
                    $password = $letras[$i].$letras[$j].$letras[$k];
                    //Añadir a la BD
                    $stmt->execute();
                }
        echo 'rainbow-3letras' . '<br>';
    }

    public function hackingEtico() {

        //reusar conexión permanente
        $this->dbh = ConexionBD::conectar();

        //preparar
        $stmt = $this->dbh->prepare(
            'select r.password 
            from rainbow r 
            where r.hash in (
                select tr.hash from testRainbow tr
                )');

        $stmt->execute();

        $passwords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($passwords as $password) {
            echo 'Password-> ' . $password['password'] . '<br>'; 
        }

    }
}

//PARTE 1
$myDict = new Rainbow();
$myDict->rainbow3();
echo 'parte 1';

//PARTE 2
$myDict->hackingEtico();
echo 'parte 2';