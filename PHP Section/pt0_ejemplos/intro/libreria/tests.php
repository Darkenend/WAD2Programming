<?php
function test() {
    return 'soy ' . $_SERVER['PHP_SELF'];
}

/*
 * Por lo tanto si incluimos algo desde la libreria hay que fijarse como hacerlo
 */

function test2() {
    return 'soy ' . dirname(__FILE__) . '/' . 'tests.php';
}

function test3() {
    return 'soy ' . __DIR__ . '/' . 'tests.php';
}
