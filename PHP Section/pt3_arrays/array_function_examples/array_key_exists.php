<?php
$needle = 'primero';
$haystack = array('primero' => 1, 'segundo' => 4);
if (array_key_exists($needle, $haystack)) {
    echo "$needle existe en el array";
}