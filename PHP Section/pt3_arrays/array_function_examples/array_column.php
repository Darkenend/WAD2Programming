<?php
$clase = array(
    array(
        'id' => 273,
        'nombre' => 'Álvaro',
        'apellido' => 'Real',
    ),
    array(
        'id' => 1337,
        'nombre' => 'Carlos',
        'apellido' => 'Vidal',
    ),
    array(
        'id' => 420,
        'nombre' => 'Fran',
        'apellido' => 'Martos',
    ),
    array(
        'id' => 524,
        'nombre' => 'Javier',
        'apellido' => 'Ramirez',
    )
);
$nombres = array_column($clase, 'nombre');
print_r($nombres);