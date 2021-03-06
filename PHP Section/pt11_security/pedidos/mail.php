<?php
use PHPMailer\PHPMailer\PHPMailer;
include "../../../vendor/autoload.php";

/**
 * Envía correo de confirmación a todas las direcciones que hay en la lista de correos
 * @param $listaCorreos array con direcciones de correo
 * @param $cuerpo el cuerpo del correo
 * @param $asunto asunto del correo (opcional)
 * @return TRUE si va bien. Información de error si algo va mal
 */
function enviarCorreoMultiples($listaCorreos, $cuerpo, $asunto = "") {
    $mail = new PHPMailer();
    $mailconfig = leerConfigMail(dirname(__FILE__)."/cfgcorreo.xml",dirname(__FILE__)."/cfgcorreo.xsd");
    $mail->IsSMTP();
    $mail->SMTPDebug = 2; //Cambiar a 1 o 2 para ver errores
    $mail->SMTPAuth = true;
    $mail->CharSet = "UTF-8";
    $mail->SMTPSecure = $mailconfig[0];
    $mail->Host = $mailconfig[1];
    $mail->Port = (int) $mailconfig[2];
    $mail->Username = $mailconfig[3];
    $mail->Password = $mailconfig[4];
    $mail->setFrom('arealg@ieslavereda.es', 'Pedidos de Restaurante');
    $mail->Subject = $asunto;
    $mail->MsgHTML($cuerpo);
    // partir la lista de correos por la coma
    $correos = explode(",", $listaCorreos);
    foreach($correos as $correo) {
        $mail->AddAddress($correo, $correo); //¿? controlar
    }
    if (!$mail->Send()) {
        return var_dump($mailconfig)."".$mail->ErrorInfo;
    } else {
        return TRUE;
    }
}

/**
 * Funcion que recupera lee la configuración del correo y la valida.
 * @param $nombre Archivo XML con la configuración del correo
 * @param $esquema Archivo XSD que valida que el XML este bien formado
 */
function leerConfigMail($nombre, $esquema) {
    $config = new DOMDocument();
    $config->load($nombre);
    if (!$config->schemaValidate($esquema)) throw new InvalidArgumentException("Hay un fallo en el fichero de configuración del correo.");
    $datos = simplexml_load_file($nombre);
    $result = [];
    $smtp = $datos->xpath("//smtp");
    $host = $datos->xpath("//host");
    $port = $datos->xpath("//port");
    $username = $datos->xpath("//username");
    $password = $datos->xpath("//password");
    $email = $datos->xpath("//email");
    $name = $datos->xpath("//name");
    $result[] = $smtp;
    $result[] = $host;
    $result[] = $port;
    $result[] = $username;
    $result[] = $password;
    $result[] = $email;
    $result[] = $name;
    return $result;
}

/**
 * Funcion principal del envio de correos.
 * @param $carrito array de códigos de producto y cantidad
 * @param $pedido código de pedido (integer)
 * @param $correo array de correos
 * @return resultado de enviar cada uno de los correos
 */
function enviarCorreos($carrito, $pedido, $correo) {
    $cuerpo = crearCorreo($carrito, $pedido, $correo);
    return enviarCorreoMultiples("$correo, pedidos@empresafalsa.com", $cuerpo, "Pedido $pedido confirmado");
}

/**
 * Función que crea el cuerpo del correo con toda la información del pedido
 * @param $carrito array con códigos de producto y cantidades
 * @param $pedido código del pedido (numérico)
 * @param $correo dirección de correo
 * @return tabla HTML con los detalles del pedido
 */
function crearCorreo($carrito, $pedido, $correo) {
    $pesototal = 0;
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
        $pesototal += $peso;
    }
    $texto .= "</table>";
    $texto .= "<p>El peso total es de $pesototal kg</p>";
    return $texto;
}