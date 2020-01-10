<?php
$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['idEquipo'];
    $equipo = $entityManager->find("Equipo", $id);
    if (!$equipo) {
        $mensaje = "Equipo no encontrado";
    } else {
        $entityManager->remove($equipo);
        try {
            $entityManager->flush();
            $mensaje = "Equipo borrado con éxito";
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
        }
    }
}