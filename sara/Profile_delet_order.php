<?php
include('connection.php');
session_start();
$order_id = $_GET['id'];  // Fixed a typo here

// Assuming you have some validation and security checks here before proceeding with the deletion

$query_delete_orders = "DELETE FROM `order` WHERE id = :customerid";
$stmt_delete_orders = $pdo->prepare($query_delete_orders);
$stmt_delete_orders->bindParam(':customerid', $order_id, PDO::PARAM_INT);

if ($stmt_delete_orders->execute()) {
    echo "Deletion successful";
    header('location:profile_order.php');
    // You can redirect or display a success message here
} else {
    // Deletion failed
    // You can redirect or display an error message here
}
?>
