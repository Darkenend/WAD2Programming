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
