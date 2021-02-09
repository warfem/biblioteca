<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require 'Exception.php'; //Estas 3 lineas es si lo has instalado sin composer
//require 'PHPMailer.php';
//require 'SMTP.php';


if (isset($_POST['enviarSug'])) {
    
    $email = $_POST['emailSug'];
    

// Esto si lo has instalado con composer
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->SMTPSecure = 'tls';
    $mail->SMTPOptions = array(                                 //añadido porqué daba error al conectarse al host
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'bibliotecaLenaus@gmail.com';                     // SMTP username
    $mail->Password   = 'valldemossa5';                               // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
    //Recipients
    $mail->setFrom('bibliotecaLenaus@gmail.com', 'Bibiloteca Lenaus');
    $mail->addAddress($email, 'Bibiloteca Lenaus');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    
    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Mensaje recibo le atenderemos lo antes posible. Gracias';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();
    header('Location: contact.php');
} catch (\Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
