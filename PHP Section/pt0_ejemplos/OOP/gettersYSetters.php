<?php
class Perro {
    private $nombre;
    public function ladrar(){
        print "Guau!";
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
}
$cachorro = new Perro();
$cachorro->setNombre("Chicken");
echo $cachorro->getNombre(); // Devuelve: Chicken