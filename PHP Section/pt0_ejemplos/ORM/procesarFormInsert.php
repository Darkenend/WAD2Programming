<?php
$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevo = new Equipo();
    $nuevo->setNombre($_POST['nombre']);
    $nuevo->setFundacion((int)$_POST['fundacion']);
    $nuevo->setSocios((int)$_POST['socios']);
    $nuevo->setCiudad($_POST['ciudad']);
    $entityManager->persist($nuevo);
    try {
        $entityManager->flush();
        $mensaje = "Equipo insertado con éxito";
    } catch (Exception $e) {
        $mensaje = $e->getMessage();
    }
}