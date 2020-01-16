<?php
require_once 'bootstrap.php';
require_once './src/Partido.php';
require_once './src/Equipo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Partidos</title>
</head>
<body>
    <?php
        $query = $entityManager->createQuery('SELECT e1.nombre as eLocal, p.golesLocal as gLocal, e2.nombre as eVisitante, p.golesVisitante as gVisitante FROM Partido p JOIN p.local e1 JOIN p.visitante e2');
        $lista_partidos = $query->getResult();
        if (count($lista_partidos) == 0) echo 'No hay ningun partido';
        else {
            foreach ($lista_partidos as $partido) {
                echo 'Local: '.$partido['eLocal'].'<br>';
                echo 'Goles: '.$partido['gLocal'].'<br>';
                echo 'Goles: '.$partido['gVisitante'].'<br>';
                echo 'Visitante: '.$partido['eVisitante'].'<hr>';
            }
        }
    ?>
</body>
</html>