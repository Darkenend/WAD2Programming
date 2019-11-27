<?php
use PHPMailer\PHPMailer\PHPMailer;

include "vendor/autoload.php";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = "arealg@ieslavereda.es";
$mail->Password = "Twoseven3";
$mail->SetFrom('arealg@ieslavereda.es', 'No soy tu mismo');
$mail->Subject = "Correo de prueba";
$mail->MsgHTML('Viva Er Beti Manque Pierda');
$address = "arealg@ieslavereda.es";
$mail->AddAddress($address, "Álvaro Real Gomez");
$resul = $mail->Send();
if(!$resul) echo "Error" . $mail->ErrorInfo;
else echo "Enviado";

function leerConfigMail($nombre, $esquema) {
    $config = new DOMDocument();
    $config->load($nombre);
    if (!$config->schemaValidate($esquema)) throw new InvalidArgumentException("Hay un fallo en el fichero de configuración del correo.");
    $datos = simplexml_load_file($nombre);
    $result = [];
    $stmp = $datos->xpath("//stmp");
    $host = $datos->xpath("//host");
    $port = $datos->xpath("//port");
    $username = $datos->xpath("//username");
    $password = $datos->xpath("//password");
    $email = $datos->xpath("//email");
    $name = $datos->xpath("//name");
    $result = [$stmp, $host, $port, $username, $password, $email, $name];
    return $result;
}