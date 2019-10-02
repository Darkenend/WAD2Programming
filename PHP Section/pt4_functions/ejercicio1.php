<?php
if (isset($_GET['input'])) {
    echo "<br>";
    $my_input = $_GET['input'];
    $result = is_even($my_input);
    if ($result) {
        echo "El numero $my_input es par";
    } else {
        echo "El numero $my_input es impar";
    }
}

function is_even($input) {
    if ($input % 2 === 0) {
        return true;
    } else {
        return false;
    }
}