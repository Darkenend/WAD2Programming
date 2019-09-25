<?php
$array_fruits = array("d"=>"pear", "a"=>"orange", "b"=>"banana", "c"=>"apricot");
asort($array_fruits);
foreach ($array_fruits as $key => $val) {
    echo "$key = $val<br>";
}