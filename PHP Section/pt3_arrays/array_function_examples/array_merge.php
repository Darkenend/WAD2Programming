<?php
$array1    = array("color" => "rojo", 2, 4);
$array2    = array("a", "b", "color" => "verde", "forma" => "trapezoide", 4);
$resultado = array_merge($array1, $array2);
print_r($resultado);