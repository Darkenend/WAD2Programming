<?php
session_start();
if (isset($_SESSION['usuario'])) {
    echo "Bienvenido ".$_SESSION['usuario']."<br>";
    echo "Es tu visita numero ".$_SESSION['amount'];
}