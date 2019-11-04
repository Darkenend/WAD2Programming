<?php
session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    $_SESSION['count']++;
}
echo 'Hola '. $_SESSION['count'];
echo '<br><a href="sesionesUsoBasico2.php">Siguiente</a>';
?>