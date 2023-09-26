<?php
include "../connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM coupon WHERE id = :id";

    try {
        $selectStatement = $pdo->prepare($selectQuery);
        $selectStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $selectStatement->execute();
        $coupon = $selectStatement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching coupon: " . $e->getMessage();
    }

    if (isset($_POST['update'])) {
        $discount = $_POST['discount'];
        $coupon_name = $_POST['coupon_name'];
        
        




        $updateQuery = "UPDATE `coupon` SET `discount`=:discount, `coupon_name`=:coupon_name WHERE id = :id";


        try {
            $updateStatement = $pdo->prepare($updateQuery);
            $updateStatement->bindValue(':discount', $discount, PDO::PARAM_STR);
            $updateStatement->bindValue(':coupon_name', $coupon_name, PDO::PARAM_STR);
            
            $updateStatement->bindValue(':id', $id, PDO::PARAM_INT);


            $updateStatement->execute();

            header("Location: coupon-view.php");
            exit();
        } catch (PDOException $e) {
            echo "Error updating coupon: " . $e->getMessage();
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
                        <h4 class="card-title">Update coupon</h4>

                        <form method="post" class="container mt-md-5" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="discount">discount</label>
                                <input class="form-control" type="text" name="discount"
                                    value="<?php echo isset($coupon['discount']) ? $coupon['discount'] : ''; ?>"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="coupon_name"> coupon_name</label>
                                <input class="form-control" type="text" name="coupon_name"
                                    value="<?php echo isset($coupon['coupon_name']) ? $coupon['coupon_name'] : ''; ?>"
                                    required>
                            </div>



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