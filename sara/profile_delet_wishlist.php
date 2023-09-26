<?php
include('connection.php');
session_start();
$wishlist_productid =$_GET['id'];


// Assuming you have some validation and security checks here before proceeding with the deletion

$query_delete_wishlist = "DELETE FROM `wishlist` WHERE  productid = :productid";
$stmt_delete_wishlist = $pdo->prepare($query_delete_wishlist);
$stmt_delete_wishlist->bindParam(':productid', $wishlist_productid, PDO::PARAM_INT);

if ($stmt_delete_wishlist->execute()) {
    // Deletion successful
    // You can redirect or display a success message here
} else {
    // Deletion failed
    // You can redirect or display an error message here
}
?>
