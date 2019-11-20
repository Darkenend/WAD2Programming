<?php
use PHPMailer\PHPMailer\PHPMailer;
require dirname(__FILE__) . "/../vendor/autoload.php";
/**
 * Función que crea el cuerpo del correo con toda la información del pedido
 * @param $carrito array con códigos de producto y cantidades
 * @param $pedido código del pedido (numérico)
 * @param $correo dirección de correo
 * @return tabla HTML con los detalles del pedido
 */
function crearCorreo($carrito, $pedido, $correo) {
    $texto = "<h1>Pedido nº $pedido </h1>";
    $texto .= "<h2>Restaurante: $correo </h2>";
    $texto .= "Detalle del pedido:";
    $productos = cargarProductos(array_keys($carrito));
    $texto .= "<table>";
    $texto .= "<tr>";
    $texto .= "<th>Nombre</th><th>Descripción</th><th>Peso</th><th>Unidades</th>";
    $texto .= "</tr>";
    foreach ($productos as $producto) {
        $cod = $producto['CodProd']; //?
        $nom = $producto['Nombre'];
        $des = $producto['Descripcion'];
        $peso = $producto['Peso'];
        $unidades = $_SESSION['carrito'][$cod];
        $texto .= "<tr>";
        $texto .= "<td>$nom</td><td>$des</td><td>$peso</td><td>$unidades</td>";
        $texto .= "</tr>";
    }
    $texto .= "</table>";
    return $texto;
}

/**
 * Envía correo de confirmación a todas las direcciones que hay en la lista de correos
 * @param $listaCorreos array con direcciones de correo
 * @param $cuerpo el cuerpo del correo
 * @param $asunto asunto del correo (opcional)
 * @return TRUE si va bien. Información de error si algo va mal
 */
function enviarCorreoMultiples($listaCorreos, $cuerpo, $asunto = "") {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0; //Cambiar a 1 o 2 para ver errores
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = "jfebrer@ieslavereda.es"; //usuario de gmail
    $mail->Password = ""; //contraseña de gmail
    $mail->SetFrom('noreply@empresafalsa.com', 'Sistema de pedidos');
    $mail->Subject = $asunto;
    $mail->MsgHTML($cuerpo);
    // partir la lista de correos por la coma
    $correos = explode(",", $listaCorreos);
    foreach($correos as $correo) {
        $mail->AddAddress($correo, $correo); //¿? controlar
    }
    if (!$mail->Send()) {
        return $mail->ErrorInfo;
    } else {
        return TRUE;
    }
}

/**
 * @param $carrito array de códigos de producto y cantidad
 * @param $pedido código de pedido (integer)
 * @param $correo array de correos
 * @return resultado de enviar cada uno de los correos
 */
function enviarCorreos($carrito, $pedido, $correo) {
    $cuerpo = crearCorreo($carrito, $pedido, $correo);
    return enviarCorreoMultiples("$correo, pedidos@empresafalsa.com", $cuerpo, "Pedido $pedido confirmado");
}