<?php
class Perro {
    private $nombre;
    private function ladrar(){
        print "Guau!";
    }
}
class Bulldog extends Perro {}
$cachorro = new Bulldog();
$cachorro->nombre = "BunBuns";
var_dump($cachorro);
/*
Devuelve:
object(Bulldog)[1]
  private 'nombre' (Perro) => null
  public 'nombre' => string 'BunBuns' (length=7)
*/
// Los métodos en cambio no se pueden usar:
$cachorro->ladrar(); // Fatal error: Call to private method