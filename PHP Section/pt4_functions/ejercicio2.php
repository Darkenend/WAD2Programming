<?php
if (isset($_GET['input'])) {
    $first = $_GET['input'];
    echo "Number in: $first<br>";
    added($first);
    echo "Number out: $first";
}

function added($input_in) {
    $get_out = $input_in + 1;
    return $get_out;
}