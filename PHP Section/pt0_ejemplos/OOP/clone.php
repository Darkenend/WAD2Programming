<?php
class Perro {
    public $nombre;
    public function __toString() {return $this->nombre;}
}
$unPerro = new Perro;
$unPerro->nombre = "Werthers"; // $unPerro se llama Werthers
// Creamos una función para cambiar el nombre:
function cambiarNombre($perro, $nombre){
    $perro->nombre = $nombre;
}
cambiarNombre($unPerro, "Smirnoff"); // ahora $unPerro se llama Smirnoff
// Clonamos el objeto $unPerro:
$otroPerro = clone $unPerro;
// Cambiamos el nombre del perro clonado:
cambiarNombre($otroPerro, "Donald"); // $otroPerro se llama Donald
// $unPerro se sigue llamando Smirnoff
echo '$unPerro: ' . $unPerro;
echo '$otroPerro: ' . $otroPerro;