<?php
class ClaseA
{
    public $var = "hola";
    // Función estática que puede llamarse sin instanciar ClaseA:
    static public function obtenerNueva(){
        // Devuelve una instancia de la clase que llame a obtenerNueva()
        return new static;
    }
    public function setterVar($var){
        $this->var = $var;
    }
}
class ClaseHija extends ClaseA{}

// +++ CASO 1 +++
// Creamos una instancia de la ClaseA
$objeto1 = new ClaseA();
// Creamos otra instancia de la ClaseA
$objeto2 = new $objeto1;
// El resultado son dos instancias distintas de la misma clase
echo '$objeto1 = new ClaseA(); $objeto2 = new $objeto1;' . '<br>';
echo 'var_dump($objeto1 !== $objeto2);' . '<br>';
var_dump($objeto1 !== $objeto2); echo '<br>';// Devuelve true, no son idénticas
// +++ CASO 2 +++
echo '$objeto3 = ClaseA::obtenerNueva();' . '<br>';
echo 'var_dump($objeto3 instanceof ClaseA);' . '<br>';
$objeto3 = ClaseA::obtenerNueva();
// obtenerNueva() se ha llamado desde ClaseA, por lo que la instancia será de la ClaseA
var_dump($objeto3 instanceof ClaseA); echo '<br>';// Devuelve true
// +++ CASO 3 +++
echo '$objeto4 = ClaseHija::obtenerNueva();' . '<br>';
echo 'var_dump($objeto4 instanceof ClaseHija);' . '<br>';
$objeto4 = ClaseHija::obtenerNueva();
// obtenerNueva() se ha llamado desde ClaseHija, por lo que la instancia será de la ClaseHija
var_dump($objeto4 instanceof ClaseHija); echo '<br>'; // Devuelve true

