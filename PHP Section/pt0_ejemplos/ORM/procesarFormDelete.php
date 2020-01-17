<?php
$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    /*buscar el equipo con el id indicado*/
    $equipo = $entityManager->find("Equipo", $id);
    if(!$equipo){
	    $mensaje = "Equipo no encontrado";
    }else{
	    $entityManager->remove($equipo);
        try{
            $entityManager->flush();
	        $mensaje = "Equipo borrado";
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
        }
    }
}   