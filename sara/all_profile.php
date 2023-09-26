<?php
include('connection.php');
session_start();

// $userid_sesstion =$_SESSION['userid'];

$userid_sesstion =2;
$query_select = "SELECT * FROM customer WHERE id =  $userid_sesstion";
$stmt_select = $pdo->prepare($query_select);
// $stmt_select->bindParam(1, $userid_sesstion);
$stmt_select->execute();
$user = $stmt_select->rowCount();
$row_use = $stmt_select->fetch(PDO::FETCH_ASSOC);

echo $row_use['Username'];echo "<br>";
echo $row_use['firstname'];echo "<br>";
echo $row_use['email'];echo "<br>";
echo $row_use['password'];echo "<br>";

// ******************************************


    // Retrieve orders for the current customer
    $query_select_orders = "SELECT * FROM `order` WHERE customerid =  $userid_sesstion";
    $stmt_select_orders = $pdo->prepare($query_select_orders);
    // $stmt_select_orders->bindParam(1, $userid_session);
    $stmt_select_orders->execute();

    while ($row_order = $stmt_select_orders->fetch(PDO::FETCH_ASSOC)) {
        echo $row_order['orderdate'] . "<br>";
        echo $row_order['totalprice'] . "<br>";
        $orderid =$row_order['id'];

        //button Ordier items 
        echo "Order_item";
        $query_select_orders_items = "SELECT * FROM `order item` WHERE 	orderid = $orderid";
        $stmt_select_orders_items = $pdo->prepare($query_select_orders_items);
        // $stmt_select_orders->bindParam(1, $userid_session);
        $stmt_select_orders_items->execute();
    
        while ($row_order_items = $stmt_select_orders_items->fetch(PDO::FETCH_ASSOC)) {
            echo $row_order_items['quantity'] . "<br>";
            echo $row_order_items['price'] . "<br>";

            $productid=$row_order_items['productid'];


            $query_select_orders_items_product = "SELECT * FROM `product` WHERE $productid =  $productid";
            $stmt_select_orders_items_product = $pdo->prepare($query_select_orders_items_product);
            // $stmt_select_orders->bindParam(1, $userid_session);
            $stmt_select_orders_items_product->execute();

            while ($row_order_items_product = $stmt_select_orders_items_product->fetch(PDO::FETCH_ASSOC)) {
                echo $row_order_items_product['Productname'] . "<br>";
                echo $row_order_items_product['price'] . "<br>";
                echo $row_order_items_product['color'] . "<br>";
                echo $row_order_items_product['stockqty'] . "<br>";
                echo $row_order_items_product['description'] . "<br>";
                // echo $row_order_items_product['image'] . "<br>";
                echo "<br>";
            }


            echo "<br>";
        }
        
        echo "<br>";
    }

    // ***********************************************

    // $query_select_orders_items = "SELECT * FROM `order item` WHERE customerid =  $userid_sesstion";
    // $stmt_select_orders_items = $pdo->prepare($query_select_orders_items);
    // // $stmt_select_orders->bindParam(1, $userid_session);
    // $stmt_select_orders_items->execute();

    // while ($row_order_items = $stmt_select_orders_items->fetch(PDO::FETCH_ASSOC)) {
    //     echo $row_order_items['quantity'] . "<br>";
    //     echo $row_order_items['price'] . "<br>";
    //     echo "<br>";
    // }

    // **************************************************2column*********

    // $query_select_orders_items_product = "SELECT * FROM `product` WHERE customerid =  $userid_sesstion";
    // $stmt_select_orders_items_product = $pdo->prepare($query_select_orders_items_product);
    // // $stmt_select_orders->bindParam(1, $userid_session);
    // $stmt_select_orders_items_product->execute();

    // while ($row_order_items_product = $stmt_select_orders_items_product->fetch(PDO::FETCH_ASSOC)) {
    //     echo $row_order_items_product['Productname'] . "<br>";
    //     echo $row_order_items_product['price'] . "<br>";
    //     echo $row_order_items_product['color'] . "<br>";
    //     echo $row_order_i;
    //     tems_product['stockqty'] . "<br>";
    //     echo $row_order_items_product['description'] . "<br>";
    //     echo $row_order_items_product['image'] . "<br>";
    //     echo "<br>";
    // }


    // ****************************************
    $query_select_shipment = "SELECT * FROM `shipment` WHERE customerid =  $userid_sesstion";
    $stmt_select_shipment = $pdo->prepare($query_select_shipment);
    // $stmt_select_orders->bindParam(1, $userid_session);
    $stmt_select_shipment->execute();

    while ($row_shipment = $stmt_select_shipment->fetch(PDO::FETCH_ASSOC)) {
        echo $row_shipment['Shipmentdate'] . "<br>";
        echo $row_shipment['country'] . "<br>";
        echo $row_shipment['city'] . "<br>";
        echo $row_shipment['address'] . "<br>";
        
    }

        // **************************************3coulmn**
        $query_select_wishlist = "SELECT * FROM `wishlist` WHERE customerid =  $userid_sesstion";
        $stmt_select_wishlist = $pdo->prepare($query_select_wishlist);
        // $stmt_select_orders->bindParam(1, $userid_session);
        $stmt_select_wishlist->execute();
    
        while ($row_wishlist = $stmt_select_wishlist->fetch(PDO::FETCH_ASSOC)) {
            echo $row_wishlist['productid'] . "<br>";
            
            $productid = $row_wishlist['productid'];


            $query_select_orders_items_product = "SELECT * FROM `product` WHERE $productid =  $productid";
            $stmt_select_orders_items_product = $pdo->prepare($query_select_orders_items_product);
            // $stmt_select_orders->bindParam(1, $userid_session);
            $stmt_select_orders_items_product->execute();

            while ($row_order_items_product = $stmt_select_orders_items_product->fetch(PDO::FETCH_ASSOC)) {
                echo $row_order_items_product['Productname'] . "<br>";
                echo $row_order_items_product['price'] . "<br>";
                echo $row_order_items_product['color'] . "<br>";
                echo $row_order_items_product['stockqty'] . "<br>";
                echo $row_order_items_product['description'] . "<br>";
                // echo $row_order_items_product['image'] . "<br>";
                echo "<br>";
            }

        }
        

        
   


    













?>