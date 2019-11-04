<?php
class Perro
{
    public $nombre = "Rudolf";
    public function ladrar(){
        print "Guau!";
    }
}
class Bulldog extends Perro {
    public function ladrar(){ 
        print "Woof!";
    }
}
$cachorro = new Bulldog(); // Instancia de la clase hija
$cachorro->nombre = "Jeffrey"; // Heredamos la propiedad padre $nombre y le asignamos Jeffrey
echo $cachorro->nombre .'<br>'; // Devuelve Jeffrey
$cachorro->ladrar() . '<br>'; // Devuelve Woof! ya que ha sobreescrito la función padre ladrar().