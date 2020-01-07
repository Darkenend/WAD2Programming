<?php
require_once "bootstrap.php";
require_once './src/Jugador.php';
require_once './src/Equipo.php';

$query = $entityManager->createQuery("select j from jugador j");
$jugadores = $query->getResult();

foreach ($jugadores as $jugador) {
    echo "Nombre: " . $jugador->getNombre() . '<br>';
}

echo '<br>' . 'Contar los jugadores  mayores de 30 años' . '<br>';
$queryContar = $entityManager->createQuery(
    "select count(j.id) as num
    from jugador j
    where j.edad > 30");

$numJugadores = $queryContar->getSingleScalarResult();
echo $numJugadores . '<br>';

