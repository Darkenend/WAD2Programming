<?php
class Comunicacion {
    public $saludo = "Hola! <br>";
    // Con el constructor disparamos un echo cada vez que se instancia la clase
    function __construct(){
        echo $this->saludo;
    }
    // Si llamamos a este método, volvemos a instanciar la clase
    public function saludar(){
        $objeto = new self;
        return $objeto;
    }
}
$obj = new Comunicacion(); // Devuelve Hola!
$otro = $obj->saludar(); // Devuelve Hola!
$otro->saludo = "Motorola! <br>";
var_dump($obj); echo '<br>';
var_dump($otro); echo '<br>';
