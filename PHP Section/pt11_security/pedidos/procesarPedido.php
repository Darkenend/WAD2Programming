<?php
/**
 * Este proceso consiste en:
 * 	- Insertar el pedido: función insertarPedido
 * 	- Si el pedido se inserta correctamente:
 * 		+ Llamar a la función enviarCorreos para enviar los correos de confirmación
 * 		+ Vaciar el carrito
 * 	- Mostrar mensajes de confirmación o error.
 */

require 'mail.php';
require 'sesiones.php';
require_once 'bd.php';
//comprueba que el usuario haya abierto sesión o redirige
comprobarSesion();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>Pedidos</title>
</head>

<body>

<?php
require 'cabecera.php';

// inserta pedido, detalles del pedido y actualiza stocks en la BBDD
$resul = insertarPedido($_SESSION['carrito'], $_SESSION['usuario']['codRes']);

if ($resul === FALSE) {
    echo 'No se ha podido insertar el pedido<br>';
} else { // Pedido Ok -> $resul es el código del nuevo pedido

    //correo del usuario que inció sesión (restaurante);
    $correo = $_SESSION['usuario']['correo'];
    echo 'Pedido realizado con éxito.
			Se enviará un correo de confirmación a: ' . $correo . '<br>';

    $conf = enviarCorreos($_SESSION['carrito'], $resul, $correo);

    if ($conf !== TRUE) {
        echo "Error al enviar: $conf <br>";
    }

    //vaciar carrito
    $_SESSION['carrito'] = [];
}
?>

</body>
</html>
