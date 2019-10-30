<?php
if (!file_exists('backups')) {
    mkdir(__DIR__ . DIRECTORY_SEPARATOR . 'backups', 0777);
}

chmod('archivo.txt.bak', 0777);
// mueve y renombra
rename ("archivo.txt.bak", "backups/12_10_19bak.txt");
// renombra
rename ("backups/12_10_19bak.txt", "backups/12_10_19txt.bak");
