<?php
// repositorios.php
require_once "bootstrap.php";
require_once './src/Jugador.php';
require_once './src/Equipo.php';

/*usar el repositorio*/
$equipos = $entityManager->getRepository('Equipo')->getListaOrdenadaFundacion();
if(count($equipos) === 0) {
	echo "No hay equipos para ordenar";
} else {
	foreach($equipos as $equipo) {
		echo "Nombre: ". $equipo->getNombre(). " -> ". $equipo->getFundacion(). "<br>";
	}
}
