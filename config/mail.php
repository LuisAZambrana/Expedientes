<?php


 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 use PHPMailer\PHPMailer\SMTP;

require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/phpmailer/src/Exception.php");
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/phpmailer/src/PHPMailer.php");
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/phpmailer/src/SMTP.php");

class mail{



public function enviar_mail($smtp,
                            $usuario_nombre,
                            $usuario_clave,
                            $port,
                            $nombre_remplazo_origen,
                            $destinatario,
                            $nombre_remplazo_destino,
                            $asunto,
                            $mensaje
                            )
    {

        
try {
    $mail = new PHPMailer(true);
    // Configurar el servidor SMTP
    $mail->isSMTP();
    $mail->Host = $smtp; // Cambia esto por el servidor SMTP de tu proveedor de correo
    $mail->SMTPAuth = true;
    $mail->Username =  $usuario_nombre; // Cambia esto por tu dirección de correo
    $mail->Password =  $usuario_clave; // Cambia esto por tu contraseña
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port =$port;

    // Configurar remitente y destinatario
    $mail->setFrom( $usuario_nombre, $nombre_remplazo_origen); // Cambia esto por tu dirección de correo y tu nombre
    $mail->addAddress($destinatario, $nombre_remplazo_destino); // Cambia esto por la dirección del destinatario y su nombre

    // Configurar el asunto y el cuerpo del correo
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body =  $mensaje;
    
    // Enviar el correo
    $mail->send();
     return true;
} catch (Exception $e) {
    return  $mail->ErrorInfo;
}
    }

}

?>