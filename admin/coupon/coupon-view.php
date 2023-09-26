<?php
include "../connection.php";

$sql = "SELECT * FROM coupon";


try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM `coupon` WHERE `id`= :id";
    $deleteStatement = $pdo->prepare($deleteQuery);

    try {
        $deleteStatement->execute(['id' => $id]);
    } catch (PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}


?>




<!doctype html>
<html lang="en">

<head>
    <title>coupon</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../nav.css">

</head>

<body>
   

    <div class="side">
        <?php
        include "../nav.php";

        ?>
        <div class="main">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">coupon</h4>

                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">discount</th>
                                            <th scope="col">coupon name </th>
                                            <th scope="col">Operation</th>
                                            <th scope="col"><a class='btn btn-primary btn-sm btn-create ' class="add"
                                                    href="create-coupon.php">create
                                                    coupon</a></th>
                                        </tr>
                                    </thead>
                                    <?php


                                    $selectQuery = "SELECT * FROM coupon";
                                    $query = $pdo->query($selectQuery);

                                    if (!$query) {
                                        echo "Query failed: " . $pdo->errorInfo()[2];
                                    }

                                    $coupons = $query->fetchAll(PDO::FETCH_ASSOC);

                                    ?>


                                    <tbody>
                                        <?php foreach ($coupons as $coupon): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $coupon['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $coupon['discount']; ?>
                                                </td>
                                                <td >
                                                    <?php echo $coupon['coupon_name']; ?>
                                                </td>
                                                
                                                <td class="d-flex flex-row ">
                                                    <a class='btn btn-primary btn-sm m-1'
                                                        href='update-coupon.php?id=<?php echo $coupon['id']; ?>'>Update</a>

                                                    <a class='btn btn-danger btn-sm m-1'
                                                        href='coupon-view.php?id=<?php echo $coupon['id']; ?>'>Delete</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
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