<?php
require_once 'bootstrap.php';
require_once './src/PartidoBidireccional.php';
require_once './src/EquipoBidireccional2.php';
$BNA = $entityManager->getRepository('EquipoBidireccional2')->findOneBy([
    'nombre' => 'Barcelona'
]);
$partidosVisitanteBNA = $BNA->getPartidosVisitante();
if (count($partidosVisitanteBNA === 0)) echo 'No hay partidos';
else {
    echo "Equipo Local: ".$partido->getLocal()->getNombre()."<br>";
    echo "Goles Local: ".$partido->getGolesLocal()."<br>";
    echo "Goles Visitante: ".$partido->getGolesVisitante()."<br>";
    echo "Equipo Visitante: ".$partido->getVisitante()->getNombre()."<hr>";
}