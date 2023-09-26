<?php
include "../connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM product WHERE id = :id";

    try {
        $selectStatement = $pdo->prepare($selectQuery);
        $selectStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $selectStatement->execute();
        $product = $selectStatement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching product: " . $e->getMessage();
    }

    if (isset($_POST['update'])) {
        $Productname = $_POST['Productname'];
        $descriptions = $_POST['descriptions'];
        $descriptionl = $_POST['descriptionl'];

        $price = $_POST['price'];
        // $stockqty = $_POST['stockqty'];
        $color = $_POST['color'];
        $image = '';
        $image2 = '';
        $image3 = '';
        


        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = file_get_contents($_FILES['image']['tmp_name']);
            // $base64Image = base64_encode($image); html size is lower 
        } else {
            $image = $product['image'];
        }


        if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
            $image2 = file_get_contents($_FILES['image2']['tmp_name']);
            // $base64Image = base64_encode($image); html size is lower 
        } else {
            $image2 = $product['image2'];
        }


        if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
            $image3 = file_get_contents($_FILES['image3']['tmp_name']);
            // $base64Image = base64_encode($image); html size is lower 
        } else {
            $image3 = $product['image3'];
        }


        $updateQuery = "UPDATE `product` SET `Productname`=:Productname, `descriptions`=:descriptions,`descriptionl`=:descriptionl, `price`=:price, `color`=:color, `image`=:image,`image2`=:image2,`image3`=:image3 WHERE id = :id";


        try {
            $updateStatement = $pdo->prepare($updateQuery);
            $updateStatement->bindValue(':Productname', $Productname, PDO::PARAM_STR);
            $updateStatement->bindValue(':descriptions', $descriptions, PDO::PARAM_STR);
            $updateStatement->bindValue(':descriptionl', $descriptionl, PDO::PARAM_STR);
            $updateStatement->bindValue(':price', $price, PDO::PARAM_STR);
            // $updateStatement->bindValue(':stockqty', $stockqty, PDO::PARAM_STR);
            $updateStatement->bindValue(':color', $color, PDO::PARAM_STR);
            $updateStatement->bindValue(':image', $image, PDO::PARAM_STR);
            $updateStatement->bindValue(':image2', $image2, PDO::PARAM_STR);
            $updateStatement->bindValue(':image3', $image3, PDO::PARAM_STR);

            $updateStatement->bindValue(':id', $id, PDO::PARAM_INT);


            $updateStatement->execute();

            header("Location: product-view.php");
            exit();
        } catch (PDOException $e) {
            echo "Error updating product: " . $e->getMessage();
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Update product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../nav.css">

</head>

<body>




    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">

            </div>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update product</h4>
                        <form method="post" class="container mt-md-5" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Productname">Product Name</label>
                                <input class="form-control" type="text" name="Productname"
                                    value="<?php echo isset($product['Productname']) ? $product['Productname'] : ''; ?>"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="description"> description</label>
                                <input class="form-control" type="text" name="description"
                                    value="<?php echo isset($product['description']) ? $product['description'] : ''; ?>"
                                    required>
                            </div>


                            <div class="form-group">
                                <label for="price">price </label>
                                <input class="form-control" type="number" name="price"
                                    value="<?php echo isset($product['price']) ? $product['price'] : ''; ?>" required>
                            </div>

                            <!-- 
                            <div class="form-group">
                                <label for="stockqty">stockqty</label>
                                <input class="form-control" type="number" name="stockqty"
                                    value="<?php echo isset($product['stockqty']) ? $product['stockqty'] : ''; ?>"
                                    required>
                            </div> -->


                            <div class="form-group">
                                <label for="color">color </label>
                                <input class="form-control" type="text" name="color"
                                    value="<?php echo isset($product['color']) ? $product['color'] : ''; ?>" required>
                            </div>



                            <div class="form-group">
                                <label for="image">Image</label>
                                <input class="form-control" type="file" name="image" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label for="image2">Image 2</label>
                                <input class="form-control" type="file" name="image2" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label for="image3">Image 3</label>
                                <input class="form-control" type="file" name="image3" accept="image/*">
                            </div>

                            <?php if (isset($product['image'])): ?>
                                <div class="form-group">
                                    <label>Current Image</label><br>
                                    <img width="100px"
                                        src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($product['image']) ?>"
                                        alt=" ">
                                </div>
                            <?php endif; ?>



                            <?php if (isset($product['image2'])): ?>
                                <div class="form-group">
                                    <label>Current Image 2</label><br>
                                    <img width="100px"
                                        src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($product['image2']) ?>"
                                        alt=" ">
                                </div>
                            <?php endif; ?>




                            <?php if (isset($product['image3'])): ?>
                                <div class="form-group">
                                    <label>Current Image 3</label><br>
                                    <img width="100px"
                                        src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($product['image3']) ?>"
                                        alt=" ">
                                </div>
                            <?php endif; ?>




                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>