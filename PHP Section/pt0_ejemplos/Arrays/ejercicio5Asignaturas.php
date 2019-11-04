<?php
$asignaturas = ["prg", "bda", "dwec", "dwes", "ed"];
$final = [];
foreach($asignaturas as $asignatura) {
    $puntuaciones = [];
    for($i = 0; $i < 6; $i++) {
        $puntuaciones[] = rand(-5, 5);
    }
    $final[$asignatura] = $puntuaciones;
}

foreach($final as $nombre=>$puntos) {
    echo "$nombre: ";
    $media = array_sum($final[$nombre]) / 6;
    if ($nombre == "ed" and $media < 3) $media = 4.99;
    printf("media: %+.2f <br>", $media);
}
?>