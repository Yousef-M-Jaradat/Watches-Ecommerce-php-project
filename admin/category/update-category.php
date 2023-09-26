<?php
include "../connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM category WHERE id = :id";

    try {
        $selectStatement = $pdo->prepare($selectQuery);
        $selectStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $selectStatement->execute();
        $category = $selectStatement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching category: " . $e->getMessage();
    }

    if (isset($_POST['update'])) {
        $Categoryname = $_POST['Categoryname'];
        $description = $_POST['description'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = file_get_contents($_FILES['image']['tmp_name']);
            // $base64Image = base64_encode($image); html size is lower 
        } else {
            $image = $category['image'];
        }


        $updateQuery = "UPDATE `category` SET `Categoryname`=:Categoryname ,`description`=:description ,`image`=:image WHERE id = :id";


        try {
            $updateStatement = $pdo->prepare($updateQuery);
            $updateStatement->bindValue(':Categoryname', $Categoryname, PDO::PARAM_STR);
            $updateStatement->bindValue(':description', $description, PDO::PARAM_STR);
            $updateStatement->bindValue(':image', $image, PDO::PARAM_STR);



            $updateStatement->bindValue(':id', $id, PDO::PARAM_INT);


            $updateStatement->execute();

            header("Location: category-view.php");
            exit();
        } catch (PDOException $e) {
            echo "Error updating category: " . $e->getMessage();
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Update Category</title>
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
                        <h4 class="card-title">Update Category</h4>
                        <form method="post" class="container mt-md-5" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Categoryname"> Category name</label>
                                <input class="form-control" type="text" name="Categoryname"
                                    value="<?php echo ($category['Categoryname']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description"> description </label>
                                <input class="form-control" type="text" name="description"
                                    value="<?php echo ($category['description']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input class="form-control" type="file" name="image" accept="image/*">
                            </div>

                            <?php if (isset($category['image'])): ?>
                                <div class="form-group">
                                    <label>Current Image</label><br>
                                    <img width="100px"
                                        src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($category['image']) ?>"
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