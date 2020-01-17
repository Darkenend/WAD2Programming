<?php
require_once "bootstrap.php";
require_once './src/PartidoBidireccional.php';
require_once './src/EquipoBidireccional2.php';
$BNA = $entityManager->getRepository('EquipoBidireccional2')
                        ->findOneBy([
                            'nombre' => 'Barcelona',
                        ]);
//$BNA = $entityManager->find("EquipoBidireccional2", 2);
$partidosVisitanteBNA = $BNA->getPartidosVisitante();
//equipo es un array de filas
//cada fila es un array de columnas (aunque solo tenga una)
if (count($partidosVisitanteBNA) === 0) {
    echo 'No hay ningún partido';
    return;
}

foreach ($partidosVisitanteBNA as $partido) {
    echo "Equipo local: " . $partido->getLocal()->getNombre() . '<br>';
    echo "Goles equipo local: " . $partido->getGolesLocal() . '<br>';
    echo "Equipo visitante: " . $partido->getVisitante()->getNombre() . '<br>';
    echo "Goles equipo visitante: " . $partido->getGolesVisitante() . '<br>';
}