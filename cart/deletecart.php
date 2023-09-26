<?php
include 'connection.php';
session_start();
$id = $_GET['delid'];
if (isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['productid'] === $id) {
            unset($_SESSION['cart'][$key]); 
            break;
        }
        
    }
    header('Location:shoping-cart.php');
}
else{
try {
    $PDOdelete = "DELETE FROM cart  WHERE productid='$id'";
    $statement = $pdo->prepare($PDOdelete);
    $statement->execute();
    header('Location:shoping-cart.php'); 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}}

?>