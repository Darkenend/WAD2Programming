<?php
require_once 'bootstrap.php';
require_once './src/Equipo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipos por Orden de Fundacion</title>
</head>
<body>
    <?php
        $lista_equipos = $entityManager->getRepository('Equipo')->getListaOrdenadaFundacion();
        foreach ($lista_equipos as $equipo) {
            echo 'Nombre: '.$equipo->getNombre().' Fundacion:'.$equipo->getFundacion().' Socios: '.$equipo->getSocios().'<br>';
        }
    ?>
</body>
</html>