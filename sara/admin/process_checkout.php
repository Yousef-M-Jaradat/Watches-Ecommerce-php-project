<?php
include('connection.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['payment'];

    // You can perform further processing here, such as saving to a database or sending an email

    // For demonstration purposes, let's just display the submitted data
    echo "<h2>Order Summary</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Address: $address</p>";
    echo "<p>Payment Method: $paymentMethod</p>";
} else {
    // Redirect back to the form if accessed directly
    header('Location: checkout.html');
    exit;
}