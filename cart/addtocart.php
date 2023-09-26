<?php include 'connection.php'; ?>
<?php
session_start();
//////////

if (!isset($_COOKIE['userid'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();

    }
    if (isset($_GET['id'])) {
        $prodID = $_GET['id'];
        $productExists = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['productid'] == $prodID) {
                $cartItem['quantity']++;
                $productExists = true;
                break;
            }
        }

        if (!$productExists) {

            $query = "SELECT Productname, price, image, categoryid FROM product WHERE id = $prodID";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $products = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            $_SESSION['cart'][] = array(
                'productid' => $prodID,
                'Productname' => $products['Productname'],
                'price' => $products['price'],
                'image' => $products['image'],
                'category' => $products['categoryid'],
                'quantity' => 1
            );
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
        $query = "SELECT * FROM cart";
        $result = $pdo->query($query);
        $cart = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($_SESSION['cart'] as $product) {

            $prodid = $product['productid'];
            $productName = $product['Productname'];
            $price = $product['price'];
            $image = $product['image'];
            $quantity = $product['quantity'];
            $prodID = $_GET['id'];
            $_SESSION['single-id-category'] = $product['category'];
            // $_SESSION['single-id-cart'] = $prodID;
            $user = $_COOKIE['userid'];

            $query = "SELECT COUNT(*) FROM cart WHERE customerid = :user AND productid = :prodid";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':prodid', $prodid);
            $stmt->execute();
            $existingProductCount = $stmt->fetchColumn();

            if ($existingProductCount == 0) {
                $query = "INSERT INTO cart (quantity, customerid,productid) VALUES ($quantity, $user,$prodid)";
                $statement = $pdo->prepare($query);
                $statement->execute();
            } else {
                $product['quantity']++;
            }
        }
        unset($_SESSION['cart']);
    } else {

        $prodID = $_GET['id'];
        $user = $_COOKIE['userid'];
        $query = "SELECT * FROM cart WHERE customerid = :user AND productid = :prodID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':prodID', $prodID);
        $stmt->execute();
        $products = $stmt->fetchAll();
        $checkinsert = true;
        
        foreach ($products as $product) {
            if ($product['productid'] == $prodID) {
                $query = "UPDATE cart SET quantity = quantity + 1 WHERE productid = :prodID";
                $updateStatement = $pdo->prepare($query);
                $updateStatement->bindParam(':prodID', $prodID);
                $updateStatement->execute();
                $checkinsert = false;
            }
        }
        
        if ($checkinsert) {
            $insertQuery = "INSERT INTO cart (quantity, customerid, productid) VALUES ('1', :user, :prodID)";
            $insertStatement = $pdo->prepare($insertQuery);
            $insertStatement->bindParam(':user', $user);
            $insertStatement->bindParam(':prodID', $prodID);
            $insertStatement->execute();
        }
        
    }
}
if (isset($_SESSION['current_url'])) {
    $savedUrl = $_SESSION['current_url'];
    header("Location:$savedUrl");
    exit();
}
header('Location:../products/product-detail.php');
?>