<?php
/* 
 * Datos de partida
 */
$numAlum = rand(60, 100);
$nombres = ["Alvaro", "Adrián", "Jorge", "Javier", "Nacho", "Nadia", "Elvira",
            "Esther", "Ian", "Irene"];
$apellidos = ["Valero", "García", "Gómez", "López", "Hermida", "Cifuentes"];
$plazasAsignaturas = [
                      "Servidor" => 15,
                      "Cliente" => 15,
                      "Diseño" => 15,
                      "Despliegue" => 15,
                      "Entorno" => 9
                      ];
$asignaturas = ["Servidor", "Cliente", "Diseño", "Despliegue", "Entorno"];
$alumnos = [];
$plazas = array_sum($plazasAsignaturas);
/*
 * Creación de alumnos
 */
for ($i = 1; $i <= $numAlum; $i++) {
    $contador = 1;
    $nombre = $nombres[rand(0, count($nombres) - 1)];
    $apellido  = $apellidos[rand(0, count($apellidos) - 1)];
    $codigo = strtolower(substr($nombre, 0, 1)). strtolower($apellido);
    
    foreach($alumnos as $alumno) {
        if (isset($alumno['codigo'])) {
            if ($alumno['codigo'] == $codigo.$contador)
                $contador++;
        }
    }
    $codigo = $codigo . $contador;
    $alumnos[$i] = [
                    "nombre" => $nombre,
                    "apellido" => $apellido,
                    "codigo" => $codigo
                    ];
    
}
/*
 * Mostrar alumnos
 */
foreach ($alumnos as $key=>$value) {
    echo $key . ' :';
    echo $value['nombre'] . ' ' . $value['apellido'] . ' ' . $value['codigo'];
    echo '<br>';
}
/*
 * Matriculación
 */
foreach ($alumnos as &$alumno) {
    while ($plazas > 0) {
        //obtener nombres de asignaturas con plazas
        $claves = array_keys($plazasAsignaturas);
        //hay al menos 2 asignaturas
        if (count($claves) >=2) {
            //seleccionar aleatoriamente dos asignaturas
            do {
                $indice = $claves [rand(0, count($claves) - 1)];
                $indice2 = $claves [rand(0, count($claves) - 1)];
            } while ($indice == $indice2);
            //asignarlas al alumno
            $alumno['asignatura1'] = $indice;
            $alumno['asignatura2'] = $indice2;
            //ajustar plazas de cada asignatura
            $plazasAsignaturas[$indice]--;
            $plazasAsignaturas[$indice2]--;
            //ajustar número de plazas
            $plazas -= 2;
            //eliminar aquellas asignaturas que se han quedado sin plazas
            if ($plazasAsignaturas[$indice] == 0) unset($plazasAsignaturas[$indice]);
            if ($plazasAsignaturas[$indice2] == 0) unset($plazasAsignaturas[$indice2]);
            break;
        //solo hay una asignatura con plazas
        } else {
            $alumno['asignatura1'] = $claves[0];
            $plazasAsignaturas[$claves[0]]--;
            $plazas--;
            if ($plazasAsignaturas[$claves[0]] == 0) unset($plazasAsignaturas[$claves[0]]);
            break;
        }
    }
}
/*
 * Listado de matriculas por asignatura
 */
echo '<br>';
echo 'Listado de alumnos por asignatura <br>';
echo '----------------------------------------------------- <br>';
foreach($asignaturas as $asignatura) {
    echo "$asignatura <br>";
    echo "-------------- <br>";
    $cont = 1;
    foreach ($alumnos as $alumno) {
        if (isset($alumno['asignatura2'])) {
            if ($alumno['asignatura1'] == $asignatura or
                $alumno['asignatura2'] == $asignatura) {
                echo " Número $cont Nombre " . $alumno['nombre'] .
                " Apellido " . $alumno['apellido'] .
                " Código " . $alumno['codigo'] . "<br>";
                $cont++;
            }
        } elseif (isset($alumno['asignatura1'])) {
            if ($alumno['asignatura1'] == $asignatura) {
                echo " Número $cont Nombre " . $alumno['nombre'] .
                " Apellido " . $alumno['apellido'] .
                " Código " . $alumno['codigo'] . "<br>";
                $cont++;
            }
        }
    }
    echo '<br>';
}
echo '<br>';
echo 'Lista de espera <br>';
echo '-------------------------- <br>';
$cont = 1;
foreach ($alumnos as $alumno) {
    if (!isset($alumno['asignatura1'])) {
        echo "$cont ";
        foreach ($alumno as $clave => $valor)
            echo "$clave - $valor ";
        echo '<br>';
        $cont++;
    }
}

echo '<br>';
echo 'Listado de alumnos <br>';
echo '------------------------------------------ <br>';
$cont = 1;
foreach ($alumnos as $alumno) {
    if (isset($alumno['asignatura1']) or isset($alumno['asignatura2'])) {
        echo "$cont ";
        foreach ($alumno as $clave => $valor)
            echo "$clave - $valor ";
        echo '<br>';
        $cont++;
    }
}
?>