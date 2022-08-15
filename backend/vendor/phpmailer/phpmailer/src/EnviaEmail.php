<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once("../../../autoload.php");

class EnviaEmail
{
    private $con;

    public function enviaEmail($emailUsuario, $nomeUsuario, $titulo)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'dreamcatchermylove@gmail.com';                     //SMTP username
            $mail->Password   = 'Jujuba123';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('dreamcatchermylove@gmail.com', 'Agenda do Vestibulando');
            $mail->addAddress($emailUsuario, $nomeUsuario);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $titulo;
            $mail->Body    = 'te amo amor <b>muito!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Email Enviado!';
        } catch (Exception $e) {
            echo "Email não enviado. Erro: {$mail->ErrorInfo}";
        }
    }
}
$teste = new EnviaEmail();
$teste->enviaEmail('fellipebarcelossaraiva@gmail.com', 'mozin hihi', 'oiw');
