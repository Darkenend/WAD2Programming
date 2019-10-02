<?php
if (isset($_GET['input'])) {
    $first = $_GET['input'];
    echo "Number in: $first<br>";
    added($first);
    echo "Number out: $first";
}

function added(&$input_in) {
    $input_in++;
    return $input_in;
}