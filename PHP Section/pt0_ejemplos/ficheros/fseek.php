<?php
$fp = fopen("archivo.txt", "r");
fseek($fp, 28);

while(!feof($fp)){
    $linea = fgets($fp);
    echo $linea;
}
fclose($fp);