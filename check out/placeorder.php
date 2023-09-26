<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $country = $_POST['c_country'];
    $c_fname = $_POST['c_fname'];
    $c_lname = $_POST['c_lname'];
    $c_address = $_POST['c_address'];
    $c_state_country = $_POST['c_state_country'];
    $c_postal_zip = $_POST['c_postal_zip'];
    $c_phone = $_POST['c_phone'];
    $Shipmentdate = date("Y-m-d H:i:s");
    session_start();
    $user = $_COOKIE['userid'];
    $total = $_SESSION['TOTAL'];
    $orderdate = date("Y-m-d H:i:s");


    $query = "INSERT INTO shipment (Shipmentdate, address, city, country, customerid, firstname, lastname, zip, phone) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($query);

    $statement->bindParam(1, $Shipmentdate);
    $statement->bindParam(2, $c_address);
    $statement->bindParam(3, $c_state_country);
    $statement->bindParam(4, $country);
    $statement->bindParam(5, $user);
    $statement->bindParam(6, $c_fname);
    $statement->bindParam(7, $c_lname);
    $statement->bindParam(8, $c_postal_zip);
    $statement->bindParam(9, $c_phone);

    if ($statement->execute()) {
        $shipmentId = $pdo->lastInsertId();

        $orderQuery = "INSERT INTO `order` (orderdate, totalprice, customerid, shipmentid) VALUES (?, ?, ?, ?)";
        $stmtInsertOrder = $pdo->prepare($orderQuery);
        $stmtInsertOrder->bindParam(1, $orderdate);
        if (isset($_SESSION['TOTALDiscount'])) {
            $discount = $_SESSION['TOTALDiscount'];
            $stmtInsertOrder->bindParam(2, $discount);
        } else {
            $stmtInsertOrder->bindParam(2, $total);
        }
        $stmtInsertOrder->bindParam(3, $user);
        $stmtInsertOrder->bindParam(4, $shipmentId);
        if ($stmtInsertOrder->execute()) {
            $orderId = $pdo->lastInsertId();
            $query = "SELECT * FROM cart WHERE customerid=$user";

            $result = $pdo->query($query);
            $carts = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($carts as $cart) {
                $prodid = $cart['productid'];
                $priceQuery = "SELECT price FROM product WHERE id=$prodid LIMIT 1";
                $priceResult = $pdo->query($priceQuery);
                $product = $priceResult->fetch(PDO::FETCH_ASSOC);
                $quantity = $cart['quantity'];
                $productPrice = $product['price'];
                $customer = $user; // Use the $user variable here

                $orderitemQuery = "INSERT INTO `orderitem` (quantity, price, orderid, productid, customerid) VALUES (:quantity, :price, :orderid, :productid, $user)";
                $stmtOrderitem = $pdo->prepare($orderitemQuery);
                $stmtOrderitem->bindValue(':quantity', $quantity);
                $stmtOrderitem->bindValue(':price', $productPrice);
                $stmtOrderitem->bindValue(':orderid', $orderId);
                $stmtOrderitem->bindValue(':productid', $prodid);
                // $stmtOrderitem->bindValue(':customerid', $customer);

                if (!$stmtOrderitem->execute()) {
                    // Error handling logic for order item insertion
                    echo "Error inserting order item: " . $stmtOrderitem->errorInfo()[2];
                }
            }

            unset($_SESSION['TOTALDiscount']);
            $deleteQuery = "DELETE FROM cart WHERE customerid = :user";
            $stmtDelete = $pdo->prepare($deleteQuery);
            session_start();
            $user = $_COOKIE['userid'];
            $stmtDelete->bindValue(':user', $user);


            if ($stmtDelete->execute()) {
                echo "All rows from the cart have been deleted.";
            } else {
                echo "Error deleting rows from the cart: " . $stmtDelete->errorInfo()[2];
            }
            header('Location: thankyou.php');
            exit;
        } else {
            // Error handling logic for order insertion
            echo "Error inserting order: " . $stmtInsertOrder->errorInfo()[2];
        }
    } else {
        echo "Error inserting shipment: " . $statement->errorInfo()[2];
    }

}


?>