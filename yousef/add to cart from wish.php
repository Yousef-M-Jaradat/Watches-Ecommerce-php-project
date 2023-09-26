<?php include 'connection.php'; ?>
<?php
session_start();

if (!isset($_COOKIE['userid'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();

    }
    if (isset($_GET['id'])) {
        $prodID = $_GET['id'];
        $productExists = false;
        $_SESSION['single-id-cart'] = $prodID;
        foreach ($_SESSION['cart'] as $cartItem) {
            if ($cartItem['productid'] == $prodID) {
                $productExists = true;
                break;
            }
        }
        if (!$productExists) {
            $query = "SELECT Productname,price,image FROM product where id=$prodID";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $products = $stmt->fetch(PDO::FETCH_ASSOC);

            if (isset($_SESSION['cart'])) {
                $_SESSION['cart'][] = array(
                    'productid' => $prodID,
                    'Productname' => $products['Productname'],
                    'price' => $products['price'],
                    'image' => $products['image'],
                    'quantity' => 1
                );
            } else {
                $_SESSION['cart'][] = array(
                    'productid' => $prodID,
                    'name' => $products['Productname'],
                    'price' => $products['price'],
                    'image' => $products['image'],
                    'quantity' => 1
                );
            }
        }
    }

    if (!isset($_COOKIE['session_id_cart'])) {
        $session_id = session_id();
        $expiration = strtotime('+1 month');
        setcookie('session_id_cart', $session_id, $expiration, '/');
    }
} else {
    if (!isset($_COOKIE['session_id_user'])) {
        $session_id = session_id();
        $expiration = strtotime('+1 month');
        setcookie('session_id_user', $session_id, time() + $expiration, '/');
    }
    if (isset($_SESSION['cart'])) {
        $checkinsert = true;
        $query = "SELECT * FROM cart";
        $result = $conn->query($query);
        $cart = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($_SESSION['cart'] as $product) {
            $prodid = $product['productid'];
            $productName = $product['Productname'];
            $price = $product['price'];
            $image = $product['image'];
            $quantity = $product['quantity'];
            $prodID = $_GET['id'];
            $_SESSION['single-id-cart'] = $prodID;
            $user = $_COOKIE['userid'];
            foreach ($cart as $row) {
                if ($row['productid'] == $prodid) {
                    $checkinsert = false;
                    break;
                }
                if ($checkinsert) {
                    $query = "INSERT INTO cart (quantity, customerid,productid) VALUES ($quantity, $user,$prodid)";
                }
                $statement = $conn->prepare($query);
                $statement->execute();
            }
        }
        // unset($_SESSION['cart']);
    } else {
        $query = "SELECT * FROM cart";
        $result = $conn->query($query);
        $cart = $result->fetchAll(PDO::FETCH_ASSOC);
        $checkinsert = true;
        $prodID = $_GET['id'];
        $_SESSION['single-id-cart'] = $prodID;
        foreach ($cart as $row) {
            if ($row['productid'] == $prodID) {
                $checkinsert = false;
                break;
            }
            if ($checkinsert) {
                $user = $_COOKIE['userid'];
                $query = "INSERT INTO cart (quantity, customerid,productid) VALUES ('1', $user,$prodID)";
            }
        }
        $statement = $conn->prepare($query);
        $statement->execute();
    }
}
header('Location:../cart/shoping-cart.php')
;
?>