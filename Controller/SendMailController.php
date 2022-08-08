<?php

require __DIR__ . "../../vendor/autoload.php";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 
//Create an instance; passing `true` enables exceptions
// Gửi email khi đăng ký thành công
function sendEmail($email, $token) {
        $mail = new PHPMailer(true);
        try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'phamvietsy2000@gmail.com';                     //SMTP username
        $mail->Password   = 'zgsqnrjlrmndxbhd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($email);
        $mail->addAddress($email);     //Add a recipient
    

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Xác nhận email';
        $mail->Body    = ' <a href="http://localhost/banhang/Controller/VerifyEmailController.php?token='. $token.'">Verify Email!</a>';
    

        $mail->send();
        echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo '<pre>';
            print_r($e);
            echo '</pre>';die;
        }
}