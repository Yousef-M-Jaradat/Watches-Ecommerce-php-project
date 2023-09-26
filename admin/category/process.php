<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Categoryname = $_POST['Categoryname'];
    $description = $_POST['description'];
    $image = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        // $base64Image = base64_encode($image); html size is lower 
    } else {
        echo "Image upload error.";
        exit();
    }

    // // Check if the provided categoryid exists in the category table
    // $categoryQuery = "SELECT id FROM category WHERE id = :id";
    // $categoryStatement = $pdo->prepare($categoryQuery);
    // $categoryStatement->bindParam(':categoryid', $categoryid, PDO::PARAM_INT);
    // $categoryStatement->execute();

    // if ($categoryStatement->rowCount() === 0) {
    //     echo "Error: Invalid category ID provided.";
    //     exit();
    // }

    $insertQuery = "INSERT INTO category (Categoryname ,description,image) VALUES (:Categoryname,:description,:image)";

    try {
        $insertStatement = $pdo->prepare($insertQuery);
        $insertStatement->bindParam(':Categoryname', $Categoryname, PDO::PARAM_STR);
        $insertStatement->bindParam(':description', $description, PDO::PARAM_STR);
        $insertStatement->bindParam(':image', $image, PDO::PARAM_STR);



        $insertStatement->execute();
        header("Location: category-view.php");
        exit();
    } catch (PDOException $e) {
        echo "Error inserting record: " . $e->getMessage();
    }
}
?>