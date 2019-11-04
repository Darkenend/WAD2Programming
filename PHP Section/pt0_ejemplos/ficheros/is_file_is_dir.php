<?php
//con is_dir
var_dump(is_dir('archivo.txt'));
var_dump(is_dir('backups'));

var_dump(is_dir('..')); //un directorio arriba
echo '<br>';
//con is_file()
var_dump(is_file('archivo.txt'));
var_dump(is_file('backups'));

var_dump(is_file('..')); //un directorio arriba
