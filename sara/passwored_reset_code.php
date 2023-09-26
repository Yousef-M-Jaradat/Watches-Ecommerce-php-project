<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\watches\sara\PHPMailer-master\src\PHPMailer.php'; //added
require 'C:\xampp\htdocs\watches\sara\PHPMailer-master\src\SMTP.php'; //added
require 'C:\xampp\htdocs\watches\sara\PHPMailer-master\src\Exception.php'; //added

include('connection.php'); // Include your database connection file
session_start();
// $_SESSION['token'];
// verify_status

function send_password_reset( $get_email, $token)
{
    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ralrjoub6@gmail.com';
        $mail->Password = 'R123456n$';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
      
        $mail->setFrom('ralrjoub6@gmail.com', 'watch');
        $mail->addAddress($get_email); // Replace with actual email and name

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Link';

        // Email template
        $get_email_template = "
            <h2>Password Reset Link</h2>
            <p>Click the following link to reset your password:</p>
            <a href='http://localhost/watches/sara/password-change.php?token=$token&email=$get_email'>Reset Password</a>
            <br><br>
        ";

        $mail->Body = $get_email_template;
        $mail->msgHTML($get_email_template);

        $mail->send();
        // echo '<script>alert("Email sent successfully");</script>';
        header('location:checkyouremail.php');
        exit();

        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


$stmt = $pdo->prepare("SELECT email, firstname, lastname, verify_status FROM customer WHERE email = :email LIMIT 1");
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();
$row1 = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row1) {
    $firstname = $row1['firstname'];
    $lastname = $row1['lastname'];
    $verify_status = $row1['verify_status'];
    $get_name = $firstname . ' ' . $lastname;
    echo $get_name ;


    // Now you can use $firstname, $lastname, and $verify_status in your email sending logic.
}

if (isset($_POST['password_reset_link'])) {
    $email = $_POST['email'];
    $token = md5(rand());

    $stmt = $pdo->prepare("INSERT INTO customer (email, verify_token) VALUES (:email, :token)");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);

    if ($stmt->execute()) {
        send_password_reset( $email, $token);
        $_SESSION['status'] = "We emailed you a password reset link.";
       
    } else {
        $_SESSION['status'] = "Error inserting token: " . $stmt->errorInfo()[2];
    }
}



// if($verify_status ==0){

// }



if (isset($_POST['password_update'])) {
    $email = $_POST['email'];
    $password = $_POST['new_Password'];
    $new_password= password_hash($password, PASSWORD_DEFAULT);
    $confirm_Password = $_POST['confirm_Password'];
    $token = $_POST['password_token'];

    // Prepare an UPDATE statement for password update
    

    if ($password === $confirm_Password) {
        $a=1;
        $updatePasswordStmt = $pdo->prepare("UPDATE customer SET password = :new_password WHERE email = :email AND verify_token = :token");

            $updatePasswordStmt->bindParam(':new_password', $new_password, PDO::PARAM_STR);
            $updatePasswordStmt->bindParam(':email', $email, PDO::PARAM_STR);
            $updatePasswordStmt->bindParam(':token', $token, PDO::PARAM_STR);
                
        if ($updatePasswordStmt->execute() && $a==1) {
            $_SESSION['status'] = "Password updated successfully!";
            // echo '<script>alert("Password updated successfully");</script>';
            header('location:password-change.php');
            
        } else {
            $_SESSION['status'] = "Error updating password: " . $updatePasswordStmt->errorInfo()[2];
        }
    } else {
       
        $_SESSION['status'] = "Passwords do not match!";
        
        
         if (isset($_SESSION['status'])) {
             echo '<script>
                 alert("' . $_SESSION['status'] . '");
                 window.location.href = "password-change.php";
             </script>';
             unset($_SESSION['status']); 
         }
         
    }


    if (!empty(($token))) {
        if (!empty(($email)) && !empty(($new_password)) && !empty(($confirm_Password))) {

        } else {
 
            $_SESSION['status'] = " fill all feild";
            if (isset($_SESSION['status'])) {
                echo '<script>
                    alert("' . $_SESSION['status'] . '");
                    window.location.href = "password_reset.php";
                </script>';
                unset($_SESSION['status']); 
            }

        }

    } else {
        $_SESSION['status'] = "No token Found";

        $_SESSION['status'] = " fill all feild";
        if (isset($_SESSION['status'])) {
            echo '<script>
                alert("' . $_SESSION['status'] . '");
                window.location.href = "password_reset.php";
            </script>';
            unset($_SESSION['status']); 
        

    }



}
}

?>