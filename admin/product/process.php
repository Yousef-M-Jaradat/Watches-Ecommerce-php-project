<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['Productname'];
    $descriptions = $_POST['descriptions'];
    $descriptionl = $_POST['descriptionl'];
    $price = $_POST['price'];
    // $stockqty = $_POST['stockqty'];
    $color = $_POST['color'];
    $categoryid = $_POST['categoryid'];
    $image = '';
    $image2 = '';
    $image3 = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        // $base64Image = base64_encode($image); html size is lower 
    } else {
        echo "Image upload error.";
        exit();
    }

    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
        $image2 = file_get_contents($_FILES['image2']['tmp_name']);
        // $base64Image = base64_encode($image); html size is lower 
    } else {
        echo "Image 2 upload error.";
        exit();
    }

    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
        $image3 = file_get_contents($_FILES['image3']['tmp_name']);
        // $base64Image = base64_encode($image); html size is lower 
    } else {
        echo "Image 3 upload error.";
        exit();
    }


    // Check if the provided categoryid exists in the category table
    $categoryQuery = "SELECT id FROM category WHERE id = :categoryid";
    $categoryStatement = $pdo->prepare($categoryQuery);
    $categoryStatement->bindParam(':categoryid', $categoryid, PDO::PARAM_INT);
    $categoryStatement->execute();

    if ($categoryStatement->rowCount() === 0) {
        echo "Error: Invalid category ID provided.";
        exit();
    }

    $insertQuery = "INSERT INTO product (Productname, descriptions,descriptionl, price,  categoryid, color, image,image2,image3)
                    VALUES (:Productname, :descriptions,:descriptionl, :price,  :categoryid, :color, :image ,:image2,:image3)";

    try {
        $insertStatement = $pdo->prepare($insertQuery);
        $insertStatement->bindParam(':Productname', $productName, PDO::PARAM_STR);
        $insertStatement->bindParam(':description', $description, PDO::PARAM_STR);
        $insertStatement->bindParam(':descriptions', $descriptions, PDO::PARAM_STR);
        $insertStatement->bindParam(':descriptionl', $descriptionl, PDO::PARAM_STR);
        $insertStatement->bindParam(':price', $price, PDO::PARAM_STR);
        // $insertStatement->bindParam(':stockqty', $stockqty, PDO::PARAM_INT);
        $insertStatement->bindParam(':color', $color, PDO::PARAM_STR);
        $insertStatement->bindParam(':image', $image, PDO::PARAM_STR);
        $insertStatement->bindParam(':image2', $image2, PDO::PARAM_STR);
        $insertStatement->bindParam(':image3', $image3, PDO::PARAM_STR);

        $insertStatement->bindParam(':categoryid', $categoryid, PDO::PARAM_INT);

        $insertStatement->execute();
        header("Location: product-view.php");
        exit();
    } catch (PDOException $e) {
        echo "Error inserting record: " . $e->getMessage();
    }
}
?>