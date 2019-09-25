<?php
$array_fruits = array("d"=>"pear", "a"=>"orange", "b"=>"banana", "c"=>"apricot");
ksort($array_fruits);
foreach ($array_fruits as $key => $val) {
    echo "$key = $val<br>";
}