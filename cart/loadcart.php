<?php include 'connection.php'; ?>
<?php
session_start();
$prodID = $_GET['id'];
if(isset($_POST['login'])){
$_SESSION['id'] = 2;
$user = $_SESSION['id'];
if (isset($_COOKIE['session_id_cart'])) {
    $session_id = session_id();
    setcookie('session_id_cart', $session_id, time() + 3600, '/');
}
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cartItem) {
        if ($cartItem['productid'] == $prodID) {
            $productExists = true;
            break;
        }
    }
    if(!$productExists){
    foreach ($_SESSION['cart'] as $product) {
        $prodid = $product['productid'];
        $productName = $product['Productname'];
        $price = $product['price'];
        $image = $product['image'];
        $quantity = $product['quantity'];
        $query = "INSERT INTO cart (quantity, customerid,productid) VALUES ($quantity, $user,$prodid)";
        $statement = $pdo->prepare($query);
        $statement->execute();
    }}
    unset($_SESSION['cart']);
    setcookie('session_id_user', '', time() - 3600, '/');
}
header('Location:shoping-cart.php');}
else if(isset($_POST['logout'])) {
    unset($_SESSION['id']);
    setcookie('session_id_user', '', time() - 3600, '/');
    header('Location:shoping-cart.php');
}
?>