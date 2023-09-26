<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $dsn = "mysql:host=localhost;dbname=watches";
    $dbusername = "root";
    $dbpassword = "";

    try {
        $conn = new PDO($dsn, $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $query = "INSERT INTO messages (name, email, subject, message) VALUES (:name, :email,:subject, :message)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        // header('location:contact.php');
        // exit;
        // echo "Message sent successfully.";
    } else {
        echo "Failed to send message.";
    }


}
?>
