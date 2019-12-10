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
        
        //TO DO

    }

    public function hackingEtico() {

       //TO DO

    }
}

//PARTE 1
$myDict = new Rainbow();
$myDict->rainbow3();//comentar para ejecutar la parte 2

//PARTE 2
$myDict->hackingEtico();