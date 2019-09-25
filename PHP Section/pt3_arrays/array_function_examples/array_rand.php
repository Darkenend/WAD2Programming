<?php
$entrada = array("Windows", "Linux", "Mac", "Android", "DOS");
$claves_aleatorias = array_rand($entrada, 2);
echo $entrada[$claves_aleatorias[0]]."<br>";
echo $entrada[$claves_aleatorias[1]]."<br>";