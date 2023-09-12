<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');
require('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require('../vendor/phpmailer/phpmailer/src/SMTP.php');

if (isset($_POST['email'])) {
    $para = 'diegoaarenas06@gmail.com';
    $de = 'visionviajera16@gmail.com';
    try {
        $name = 'prueba';
        $asunto = 'Prueba asunto';
        $msg = 'esta es la prueba';
        $email = 'visionviajera16@gmail.com';
        $header = "From: diegoaarenas@gmail.com" . "\r\n";
        $header .= "Reply-To: visionviajera16@gmail.com" . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion();

        // Configuración de SMTP y conexión segura TLS
        ini_set("SMTP", "smtp.gmail.com");
        ini_set("smtp_port", "25");
        ini_set("sendmail_from", "visionviajera16@gmail.com");
        ini_set("smtp_ssl", "tls");

        $mail = @mail($email, $asunto, $msg, $header);

        if ($mail) {
            echo 'Se envió correctamente';
        } else {
            $error = error_get_last();
            if ($error) {
                echo 'Error: ' . $error['message'];
            } else {
                echo 'Problemitas';
            }
        }
    } catch (Exception $e) {
        echo 'Mensaje ' . $mailer->ErrorInfo;
    }
}
