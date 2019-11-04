<?php
$apuesta = [];
$contador = 0;
$esta = false;
$aleatorio = 0;
$escribo = 1;

//generar 6 aleatorios diferentes
while ($contador < 6) {
    $esta = false;
    $aleatorio = rand(1, 50);
    foreach($apuesta as $numero) {
        if ($numero == $aleatorio) {
            $esta = true;
            break;
        }
    }
    if (!$esta) {
        $apuesta[] = $aleatorio;
        $contador++;
    }
}

//generar tabla
echo '<table>';
//generar 5 filas
for ($i = 1; $i <= 5; $i++) {
    echo '<tr>';
    //generar 10 columnas
    for($j = 1; $j <= 10; $j++) {
        $esta = false;
        //comprobar si se va ha escribir una apuesta
        foreach($apuesta as $numero) {
            if ($numero == $escribo) {
                $esta = true;
                break;
            }
        }
        //escribo apuesta
        if ($esta) {
            echo '<td style="color: red;">X</td>';
        } else { //escribo número
            echo "<td>$escribo</td>";
        }
        $escribo++;
    }
    echo '</tr>';
}
echo '</table>';

//escribo array de apuestas
echo 'La apuesta es:';
foreach ($apuesta as $numero) {
    echo " $numero";
}
?>