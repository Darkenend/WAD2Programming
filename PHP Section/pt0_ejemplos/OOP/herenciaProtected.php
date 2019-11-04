<?php
class Perro {
    protected $nombre;
    protected function ladrar(){
        print "Guau!";
    }
}
class Bulldog extends Perro {
    public function ladrarBulldog(){
        // Podemos acceder a ladrar() de la clase Perro
        return $this->ladrar();
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombre(){
        print $this->nombre;
    }
}

$cachorro = new Bulldog();
// Podemos acceder a la función ladrar() desde ladrarBulldog():
$cachorro->ladrarBulldog(); // Devuelve Guau!
echo '<br>';
// No podemos acceder a ladrar() desde el objeto cachorro:
//$cachorro->ladrar(); // Fatal error: Call to protected method Perro::ladrar()
// Tampoco podemos asignarle un nombre, pues $nombre también es protected
//$cachorro->nombre = "Hunky"; // Fatal Error: Cannot access protected property
// Si podemos asignarle un valor con el método setNombre():
$cachorro->setNombre("Hunky");
// Y mostrarlo con getNombre():
echo $cachorro->getNombre(); // Devuelve: Hunky
echo '<br>';