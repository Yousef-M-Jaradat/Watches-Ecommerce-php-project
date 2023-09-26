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

    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "yousef.jaradat87@gmail.com"; // website email
    $mail->Password = "xcneudtiluvciwvy";

    $mail->IsHTML(true);

    include 'connection.php';
    $query = "SELECT email FROM customer WHERE role= 1";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $admin):
        $mail->AddAddress($admin['email'], "admin"); // admin email
    endforeach;
    $mail->SetFrom($email, $name);
    $mail->Subject = $subject;
    $content = $message . "<br><br>Email: " . $email;
    $mail->MsgHTML($content);
    $mail->send();



    $mail->clearAddresses();
    $mail->AddAddress($email, "admin"); // admin email
    $mail->SetFrom($email, "admin");
    $mail->Subject = "Dear $name";
    $contentNew = "Thanks for contact us <br> We will contact with you as soon as possible.";
    $mail->MsgHTML($contentNew);
    $mail->send();




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