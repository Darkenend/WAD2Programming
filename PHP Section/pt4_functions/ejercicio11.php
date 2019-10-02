<?php
$mode = $_GET['bgmode'];
if (!isset($_GET['bgmode'])) {
    $mode = 0;
}
$p_number = mt_rand(1, 14);
$r_num = mt_rand(0, 255);
$g_num = mt_rand(0, 255);
$b_num = mt_rand(0, 255);
$a_num = mt_rand(0, 100) / 100;
$hex_res = "#000000";
if ($mode == 1) {
    $r_num = dechex($r_num);
    $g_num = dechex($g_num);
    $b_num = dechex($b_num);
    $hex_res = "#" . $r_num . $g_num . $b_num;
}
echo "<html lang='es'>";
echo "<head>";
echo "<title>Mi vida es una mierda</title>";
echo "</head>";
if ($mode == 0) {
    echo "<body style='background-color: rgba($r_num, $g_num, $b_num, $a_num)'>";
} else {
    echo "<body style='background-color: $hex_res'>";
}
for ($i = 0; $i < $p_number; $i++) {
    echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
}
ending();
echo "</body>";
echo "</html>";

function ending()
{
    echo "<br><br><br><br>";
    echo ">Vuelta al formulario</a>";
}

?>