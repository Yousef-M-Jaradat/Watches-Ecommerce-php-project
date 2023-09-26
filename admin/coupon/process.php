<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $discount = $_POST['discount'];
    $coupon_name = $_POST['coupon_name'];

    $insertQuery = "INSERT INTO coupon (discount, coupon_name)
                    VALUES (:discount, :coupon_name)";

    try {
        $insertStatement = $pdo->prepare($insertQuery);
        $insertStatement->bindParam(':discount', $discount, PDO::PARAM_STR); // Use $discount instead of $description
        $insertStatement->bindParam(':coupon_name', $coupon_name, PDO::PARAM_STR); // Use $coupon_name instead of $productName

        $insertStatement->execute();
        header("Location: coupon-view.php");
        exit();
    } catch (PDOException $e) {
        echo "Error inserting record: " . $e->getMessage();
    }
}
?>
