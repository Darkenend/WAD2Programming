<?php
class ClaseA{}
// Creamos un objeto
$objeto = new ClaseA();
// Asignamos la variable $asignada a ese objeto
$asignada = $objeto;
// Asignamos por referencia $referencia a ese objeto
$referencia =& $objeto;
// Desde el propio objeto, creamos la propiedad $var
$objeto->var = 'La propiedad $var de $asignada tendrá este valor';
// Asignamos null a $objeto, lo cual también afectará a $referencia
$objeto = null;
// Hacemos var_dump de las tres variables:
var_dump($objeto); echo '<br>';// Devuelve : null
var_dump($referencia); echo '<br>';// Devuelve : null
var_dump($asignada); echo '<br>';
/*
Devuelve:
object(ClaseA)[1]
  public 'var' => string '$asignada tendrá este valor' (length=28)
*/

class ClaseB {
    public $fruta;
    public function __construct(string $fruta = "Melón") {
        $this->fruta = $fruta;
    }
    public function __toString() {
        return "Mi fruta preferida es: " . $this->fruta;
    }
}
echo '<hr>';
$objeto = new ClaseB();
$asignada = $objeto;
echo '$objeto: ' .$objeto . '<br>';
echo '$asignada: ' . $asignada . '<br>';
echo '$asignada->fruta = "asignadaMelón"' . '<br>';
$asignada->fruta = "asignadaMelón";
echo '$objeto: ' .$objeto . '<br>';
echo '$asignada: ' . $asignada . '<br>';
$referencia = &$objeto;
echo '$referencia->fruta = "referenciaMelón"' . '<br>';
$referencia->fruta = "referenciaMelón";
echo '$objeto: ' . $objeto . '<br>';
echo '$asignada: ' . $asignada . '<br>';
echo '$referencia: ' . $referencia. '<br>';
echo '$referencia = null' . '<br>';
$referencia = null;
echo '$objeto: ' . $objeto . '<br>';
echo '$asignada: ' . $asignada . '<br>';
echo '$referencia: ' . $referencia. '<br>';

$asignada2 = $asignada;
echo '$asignada = null' . '<br>';
$asignada = null;
echo '$asignada: ' . $asignada . '<br>';
echo '$asignada2: ' . $asignada2 . '<br>';


