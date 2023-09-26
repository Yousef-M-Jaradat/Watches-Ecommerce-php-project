<?php
include('connection.php');
session_start();
$shipment_id = $_GET['id']; // Fixed a typo here

// Assuming you have some validation and security checks here before proceeding with the deletion

$query_delete_orders = "DELETE FROM `shipment` WHERE id = :shipment_id ";
$stmt_delete_orders = $pdo->prepare($query_delete_orders);
$stmt_delete_orders->bindParam(':shipment_id', $shipment_id, PDO::PARAM_INT);

if ($stmt_delete_orders->execute()) {
    echo "Deletion successful";
    header('location:profile_shipment.php');
    // You can redirect or display a success message here
} else {
    // Deletion failed
    // You can redirect or display an error message here
}
?>