<?php
require_once "bootstrap.php";
require_once './src/Jugador.php';
require_once './src/Equipo.php';

$query = $entityManager->createQuery("select j.nombre as nombre, e.nombre as equipo 
                                        from jugador j join j.equipo e 
                                        where e.ciudad = 'Madrid'");
$jugadores = $query->getResult();
//jugadores es un array de filas
//cada fila es un array de columnas (aunque solo tenga una)
if (count($jugadores) === 0) {
    echo 'No hay ningún jugador de esa ciudad';
    return;
}

foreach ($jugadores as $jugador) {
        echo "nombre: " . $jugador['nombre'] . "-> ";
        echo "equipo: " . $jugador['equipo'] . '<br>';
}
