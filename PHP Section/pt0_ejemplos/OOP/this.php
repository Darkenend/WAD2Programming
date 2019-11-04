<?php
class ClaseA {
    function funcionA()
    {
        if(isset($this)){
            echo '$this está definido, su clase es: ';
            // La función get_class devuelve el nombre de la clase de un objeto:
            echo get_class($this) . "<br>";
        } else {
            echo '$this no está definido <br>';
        }
    }
}
class ClaseB {
    function funcionB() {
        // Se llama estáticamente a la función A, pero ésta no es estática
        // Si E_STRICT está activado generará un aviso
        ClaseA::funcionA();
    }
}
// Probamos a instanciar Clase A y a usar la función functionA
$a = new claseA(); // $a es un objeto
$a->funcionA(); // Devuelve: $this está definido, su clase es: ClaseA

// Llamada estática a funcionA
ClaseA::funcionA(); // Devuelve: $this no está definido
// $this no funciona, no hay objeto al que hacer referencia

// Instanciamos la clase B
$b = new ClaseB(); // $b es otro objeto
$b->funcionB(); // Devuelve: $this está definido, su clase es: ClaseB
// Pero emite un E_STRICT por llamar estáticamente ClaseA::funcionA()

// Llamada estática a funcionB
ClaseB::funcionB(); // Devuelve: $this no está definido
// De nuevo el mismo caso que con ClaseA::funcionA()