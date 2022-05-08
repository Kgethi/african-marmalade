<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function cleanData($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}




if (isset($_POST['submit'])) {

    $name = cleanData($_POST['name']);
    $surname = cleanData($_POST['surname']);
    $email = cleanData($_POST['email']);
    $organisation = cleanData($_POST['organisation']);
    $reason = cleanData($_POST['reason']);

    $htmlMail = "<p>$name $surname wants to get involved. <br> Email: $email <br> Organisation: $organisation <br> Reason: $reason</p>";

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $fullName = $name . " " . $surname;
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'euria.co.za';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'admin@euria.co.za';                     //SMTP username
        $mail->Password   = 'Ledwaba47_!';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('admin@euria.co.za', 'Mailer');
        $mail->addAddress('kgethi47@gmail.com', $fullName);     //Add a recipient
        $mail->addReplyTo('admin@euria.co.za', 'Mailer');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $htmlMail;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
