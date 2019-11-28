<?php
use PHPMailer\PHPMailer\PHPMailer;

include "../../vendor/autoload.php";

$mail = new PHPMailer();
$mail->IsSMTP();
// cambiar a 0 para no ver mensajes de error
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
// introducir usuario de google
$mail->Username = "arealg@ieslavereda.es";
// introducir clave
$mail->Password = "Twoseven3";
$mail->SetFrom('arealg@ieslavereda.es', 'No soy tu mismo');
// asunto
$mail->Subject = "Correo de prueba";
// cuerpo
$mail->MsgHTML('Viva Er Beti Manque Pierda');
// adjuntos
$mail->addAttachment("../../README.md");
// destinatario
$address = "arealg@ieslavereda.es";
$mail->AddAddress($address, "Álvaro Real Gomez");
// enviar
$resul = $mail->Send();
if(!$resul) {
    echo "Error" . $mail->ErrorInfo;
} else {
    echo "Enviado";
}
