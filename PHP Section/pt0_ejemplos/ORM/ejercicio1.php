<?php
require_once "bootstrap.php";
require_once './src/Equipo.php';

if (!empty($_GET['codigo'])) {
    if (!filter_var($_GET['codigo'], FILTER_VALIDATE_INT)) {
        echo 'Te falta: ?codigo=numero';
        return;
    }
    $codigo = $_GET['codigo'];
    // search with primary key
    $eq = $entityManager->find("Equipo", $codigo);
    if (!$eq) {
        echo "Equipo no encontrado";
        echo '<br>';
        return;
    }
    echo 'Nombre: '.$eq->getNombre();
    echo '<br>';
    echo 'Fundado: '.$eq->getFundacion();
    echo '<br>';
    echo 'Socios: '.$eq->getSocios();
    echo '<br>';
    echo 'Ciudad: '.$eq->getCiudad();
} else {
    echo 'Te falta: ?codigo=numero';
}