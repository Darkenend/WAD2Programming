<?php
require_once "bootstrap.php";
require_once './src/Jugador.php';
require_once './src/Equipo.php';

$query = $entityManager->createQuery("select e.nombre 
                                        from equipo e
                                        where e.socios > 10000");
$equipos = $query->getResult();
//equipos es un array de filas
//cada fila es un array de columnas (aunque solo tenga una)
if (count($equipos) === 0) {
    echo 'No hay ningún equipo que contenga dichos socios';
    return;
}

foreach ($equipos as $equipo)
    foreach ($equipo as $valor) //o notación array $equipo['nombre']
        echo "Nombre equipo: " . $valor . '<br>';
