<?php
if (!isset($_COOKIE['visitas'])) {
    setcookie('visitas', '1', time() + 24*60*60);
    echo 'Bienvenid@ por primera vez';
} else { // si existe
    $visitas = (int)$_COOKIE['visitas'];
    $visitas++;
    setcookie('visitas', $visitas, time() + 24*60*60);
    echo "Bienvenid@ por $visitas vez";
}
?>