<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $insertQuery = "INSERT INTO customer (firstname, lastname, email, password, role) VALUES (:firstname, :lastname, :email, :password, :role)";

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $insertStatement = $pdo->prepare($insertQuery);
        $insertStatement->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $insertStatement->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $insertStatement->bindParam(':email', $email, PDO::PARAM_STR);
        $insertStatement->bindParam(':password', $hashedPassword, PDO::PARAM_STR);  
        $insertStatement->bindParam(':role', $role, PDO::PARAM_STR);

        $insertStatement->execute();
        header("Location: customer-view.php");
        exit();
    } catch (PDOException $e) {
        echo "Error inserting record: " . $e->getMessage();
    }
}
?>