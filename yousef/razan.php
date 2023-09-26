<?php include 'connection.php'; ?>
<?php
session_start();

if (!isset($_COOKIE['userid'])) {
    if (!isset($_SESSION['whishlist'])) {
        $_SESSION['whishlist'] = array();

    }
    if (isset($_GET['id'])) {
        $prodID = $_GET['id'];
        $productExists = false;
        $_SESSION['single-id-whishlist'] = $prodID;
        foreach ($_SESSION['whishlist'] as $whishlistItem) {
            if ($whishlistItem['productid'] == $prodID) {
                $productExists = true;
                break;
            }
        }
        if (!$productExists) {
            $query = "SELECT Productname,price,image FROM product where id=$prodID";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $products = $stmt->fetch(PDO::FETCH_ASSOC);

            if (isset($_SESSION['whishlist'])) {
                $_SESSION['whishlist'][] = array(
                    'productid' => $prodID,
                    'Productname' => $products['Productname'],
                    'price' => $products['price'],
                    'image' => $products['image'],
                    'quantity' => 1
                );
            } else {
                $_SESSION['whishlist'][] = array(
                    'productid' => $prodID,
                    'name' => $products['Productname'],
                    'price' => $products['price'],
                    'image' => $products['image'],
                    'quantity' => 1
                );
            }
        }
    }

    if (!isset($_COOKIE['session_id_whishlist'])) {
        $session_id = session_id();
        $expiration = strtotime('+1 month');
        setcookie('session_id_whishlist', $session_id, $expiration, '/');
    }
} else {
    if (!isset($_COOKIE['session_id_user'])) {
        $session_id = session_id();
        $expiration = strtotime('+1 month');
        setcookie('session_id_user', $session_id, time() + $expiration, '/');
    }
    if (isset($_SESSION['whishlist'])) {
        $checkinsert = true;
        $query = "SELECT * FROM whishlist";
        $result = $pdo->query($query);
        $whishlist = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($_SESSION['whishlist'] as $product) {
            $prodid = $product['productid'];
            $productName = $product['Productname'];
            $price = $product['price'];
            $image = $product['image'];
            $quantity = $product['quantity'];
            $prodID = $_GET['id'];
            $_SESSION['single-id-whishlist'] = $prodID;
            $user = $_COOKIE['userid'];
            foreach ($whishlist as $row) {
                if ($row['productid'] == $prodid) {
                    $checkinsert = false;
                    break;
                }
                if ($checkinsert) {
                    $query = "INSERT INTO whishlist (quantity, customerid,productid) VALUES ($quantity, $user,$prodid)";
                }
                $statement = $pdo->prepare($query);
                $statement->execute();
            }
        }
        unset($_SESSION['whishlist']);
    } else {
        $query = "SELECT * FROM wishlist";
        $result = $pdo->query($query);
        $whishlist = $result->fetchAll(PDO::FETCH_ASSOC);
        $checkinsert = true;
        $prodID = $_GET['id'];
        $_SESSION['single-id-whishlist'] = $prodID;
        foreach ($whishlist as $row) {
            if ($row['productid'] == $prodID) {
                $checkinsert = false;
                break;
            }
            if ($checkinsert) {
                $user = $_COOKIE['userid'];
                $query = "INSERT INTO wishlist ( customerid,productid) VALUES ( $user,$prodID)";
            }
        }
        $statement = $pdo->prepare($query);
        $statement->execute();
    }
}
header('Location:../home.php')
;
?>