<?php
session_start();
echo 'La variable count vale: ' . $_SESSION['count'];
echo '<br><a href="sesionesUsoBasico.php">Anterior</a>';