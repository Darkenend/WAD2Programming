<?php
$dir = 'uploads/';
if ($_FILES['fichero']['size'] > 256 * 1024) {
    echo '<br> Demasiado grande';
    return;
}
echo 'Nombre del fichero: '.$_FILES['fichero']['name'];
echo '<br> Nombre temporal del fichero en el servidor: '.$_FILES['fichero']['tmp_name'];
$res = move_uploaded_file($_FILES['fichero']['tmp_name'],
    $dir.$_FILES['fichero']['name']);
if ($res) echo '<br> Fichero guardado';
else echo '<br> Error';
