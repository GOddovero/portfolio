<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function enviarEmail($nombre, $apellido, $email, $mensaje) {
    // Cargar configuración
    $config = include __DIR__ . '/../config/email_config.php';
    
    $mail = new PHPMailer(true);
    
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = $config['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['smtp_username'];
        $mail->Password = $config['smtp_password'];
        $mail->SMTPSecure = $config['smtp_secure'] === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $config['smtp_port'];
        
        // Configuración adicional para servidores con SSL
        if ($config['smtp_secure'] === 'ssl') {
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        }
        
        // Configuración del charset
        $mail->CharSet = 'UTF-8';
        
        // Remitente y destinatario
        $mail->setFrom($config['from_email'], $config['from_name']);
        $mail->addAddress($config['to_email']);
        $mail->addReplyTo($email, "$nombre $apellido");
        
        // Contenido del email
        $mail->isHTML(true);
        $mail->Subject = 'Contacto PORTFOLIO - ' . $nombre . ' ' . $apellido;
        
        $mail->Body = "
        <html>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #f4f4f4; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
                .content { background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; color: #555; }
                .message-box { background-color: #f9f9f9; padding: 15px; border-left: 4px solid #007cba; margin-top: 15px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Nuevo mensaje desde tu Portfolio</h2>
                </div>
                <div class='content'>
                    <div class='field'>
                        <span class='label'>Nombre:</span> {$nombre} {$apellido}
                    </div>
                    <div class='field'>
                        <span class='label'>Email:</span> {$email}
                    </div>
                    <div class='field'>
                        <span class='label'>Fecha:</span> " . date('d/m/Y H:i:s') . "
                    </div>
                    <div class='message-box'>
                        <div class='label'>Mensaje:</div>
                        <p>" . nl2br(htmlspecialchars($mensaje)) . "</p>
                    </div>
                </div>
            </div>
        </body>
        </html>";
        
        // Versión en texto plano
        $mail->AltBody = "Nombre: {$nombre} {$apellido}\n";
        $mail->AltBody .= "Email: {$email}\n";
        $mail->AltBody .= "Fecha: " . date('d/m/Y H:i:s') . "\n\n";
        $mail->AltBody .= "Mensaje:\n{$mensaje}";
        
        $mail->send();
        return ['success' => true, 'message' => '¡Mensaje enviado correctamente! Te contactaré pronto.'];
        
    } catch (Exception $e) {
        error_log("Error al enviar email: " . $mail->ErrorInfo);
        return ['success' => false, 'message' => 'Error al enviar el mensaje. Por favor, intenta nuevamente más tarde.'];
    }
}

// Función alternativa para desarrollo local (simula el envío)
function enviarEmailLocal($nombre, $apellido, $email, $mensaje) {
    // Guardar el mensaje en un archivo de log para desarrollo
    $logFile = __DIR__ . '/../logs/contactos.txt';
    
    // Crear directorio de logs si no existe
    if (!file_exists(dirname($logFile))) {
        mkdir(dirname($logFile), 0777, true);
    }
    
    $logContent = "\n" . str_repeat("=", 50) . "\n";
    $logContent .= "NUEVO CONTACTO - " . date('d/m/Y H:i:s') . "\n";
    $logContent .= str_repeat("=", 50) . "\n";
    $logContent .= "Nombre: {$nombre} {$apellido}\n";
    $logContent .= "Email: {$email}\n";
    $logContent .= "Mensaje:\n{$mensaje}\n";
    $logContent .= str_repeat("=", 50) . "\n";
    
    file_put_contents($logFile, $logContent, FILE_APPEND | LOCK_EX);
    
    return ['success' => true, 'message' => '¡Mensaje recibido correctamente! (Modo desarrollo - Check logs/contactos.txt)'];
}
?>
