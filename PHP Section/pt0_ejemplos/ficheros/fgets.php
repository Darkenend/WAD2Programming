<?php
$fp = fopen("archivo.txt", "r");
while (!feof($fp)){
    $linea = fgets($fp);
    echo $linea;
}
fclose($fp);
?>