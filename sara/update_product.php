<?php

session_start();
include('connection.php');
$orderid = $_GET['order_item_id'];


// Update query
$query_delete_product = "DELETE from`order item` WHERE id = :orderid";
$stmt_delete_product = $pdo->prepare($query_delete_product);
// // $stmt_delete_product->bindParam(':new_name', $newProductName, PDO::PARAM_STR);
// // $stmt_delete_product->bindParam(':new_price', $newProductPrice, PDO::PARAM_STR);
// // $stmt_delete_product->bindParam(':new_color', $newProductColor, PDO::PARAM_STR);
// // $stmt_delete_product->bindParam(':new_stock', $newProductStock, PDO::PARAM_INT);
// // $stmt_delete_product->bindParam(':new_description', $newProductDescription, PDO::PARAM_STR);
$stmt_delete_product->bindParam(':orderid', $orderid, PDO::PARAM_INT);

if ($stmt_delete_product->execute()) {
    header("Location:profile_Product.php");
    exit();
}


?>