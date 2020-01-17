<?php
require_once "bootstrap.php";
require_once './src/Partido.php';
require_once './src/Equipo.php';

$query = $entityManager->createQuery(
                            "SELECT e1.nombre as eLocal, p.golesLocal as gLocal, 
                            e2.nombre as eVisitante, p.golesVisitante as gVisitante 
                            FROM Partido p JOIN p.local e1 JOIN p.visitante e2" 
                        );
$partidos = $query->getResult();
//equipo es un array de filas
//cada fila es un array de columnas (aunque solo tenga una)
if (count($partidos) === 0) {
    echo 'No hay ningún partido';
    return;
}

foreach ($partidos as $partido) {
    echo "Nombre equipo local: " . $partido['eLocal'] . '<br>';
    echo "Goles equipo local: " . $partido['gLocal'] . '<br>';
    echo "Nombre equipo visitante: " . $partido['eVisitante'] . '<br>';
    echo "Goles equipo visitante: " . $partido['gVisitante'] . '<br>';
}
