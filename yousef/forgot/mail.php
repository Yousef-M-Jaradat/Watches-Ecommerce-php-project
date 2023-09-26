<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient, $subject, $message, $name)
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    $mail = new PHPMailer();
    $mail->IsSMTP();

    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "yousef.jaradat87@gmail.com"; // website email
    $mail->Password   = "xcneudtiluvciwvy";

    $mail->IsHTML(true);
    $mail->AddAddress("engyousef.jaradat@gmail.com", "admin"); // admin email
    $mail->SetFrom("yousef.jaradat87@gmail.com", $name);

    $mail->Subject = $subject;
    // $mail->email = $email;

    $content = $message . "<br><br>Email: " . $email;

    $mail->MsgHTML($content);
    
    if (!$mail->Send()) {
        //echo "Error while sending Email.";
        //var_dump($mail);
        return false;
    } else {
        //echo "Email sent successfully";
        return true;
    }
}
?>
