<?php
require_once 'ConexionBD.php';
/**
 * Clase que implementa un rainbow md5 para 3 o menos letras de tamaño
 * Solo trabaja contraseñas con letras en minúsculas combinadas con números
 */
class Rainbow {
    private $dbh;
    public function __construct() {
        $this->dbh = ConexionBD::conectar();
    }
    
    public function rainbow3() {
        // Loop that handles the length of the rainbow password
        for ($length=1; $length < 4; $length++) {
            for ($i=0; $i < MAX; $i++) { 
                if ($length > 1) {
                    for ($j=0; $j < MAX; $j++) { 
                        if ($length > 2) {
                            for ($k=0; $k < MAX; $k++) { 
                                // INSERTION BLOCK LENGTH THREE
                                $password = substr(CARACTERES, $i, 1).substr(CARACTERES, $j, 1).substr(CARACTERES, $k, 1);
                                $hash = md5($password);
                                $this->insertRainbow($password, $hash);
                            }
                        } else {
                            // INSERTION BLOCK LENGTH TWO
                            $password = substr(CARACTERES, $i, 1).substr(CARACTERES, $j, 1);
                            $hash = md5($password);
                            $this->insertRainbow($password, $hash);
                        }
                    }
                } else {
                    // INSERTION BLOCK LENGTH ONE
                    $password = substr(CARACTERES, $i, 1);
                    $hash = md5($password);
                    $this->insertRainbow($password, $hash);
                }
            }
        }
    }
    
    
    public function hackingEtico() {
        $stmt = $this->dbh->prepare("SELECT `password` FROM `rainbow` WHERE `hash`='2af54305f183778d87de0c70c591fae4' OR `hash`='9e94b15ed312fa42232fd87a55db0d39' OR `hash`='f561aaf6ef0bf14d4208bb46a4ccb3ad'");
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $pass) {
            echo "Password->".$pass['password']."<br>";
        }
    }

    public function insertRainbow($password, $hash) {
        $stmt = $this->dbh->prepare("INSERT INTO `rainbow` (`hash`, `password`) VALUES (:hash, :password)");
        $stmt->bindParam(":hash", $hash, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
    }
}

//PARTE 1
define('CARACTERES', "0123456789abcdefghijklmnopqrstuvwxyz");
define('MAX', strlen(CARACTERES));
$myDict = new Rainbow();
$myDict->rainbow3();//comentar para ejecutar la parte 2

//PARTE 2
$myDict->hackingEtico();