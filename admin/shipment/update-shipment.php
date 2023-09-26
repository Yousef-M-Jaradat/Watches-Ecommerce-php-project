<?php
include "../connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM shipment WHERE id = :id";

    try {
        $selectStatement = $pdo->prepare($selectQuery);
        $selectStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $selectStatement->execute();
        $shipment = $selectStatement->fetch(PDO::FETCH_ASSOC);


    } catch (PDOException $e) {
        echo "Error fetching shipment: " . $e->getMessage();
    }


    if (isset($_POST['update'])) {
        $Shipmentdate = $_POST['Shipmentdate'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $zip = $_POST['zip'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $customerid = $_POST['customerid'];

        $updateQuery = "UPDATE `shipment` SET `firstname`=:firstname,`lastname`=:lastname,`phone`=:phone,`zip`=:zip, `Shipmentdate`=:Shipmentdate, `address`=:address, `city`=:city, `country`=:country, `customerid`=:customerid WHERE id = :id";



        try {
            $updateStatement = $pdo->prepare($updateQuery);
            $updateStatement->bindValue(':Shipmentdate', $Shipmentdate, PDO::PARAM_STR);
            $updateStatement->bindValue(':address', $address, PDO::PARAM_STR);
            $updateStatement->bindValue(':city', $city, PDO::PARAM_STR);
            $updateStatement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $updateStatement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $updateStatement->bindValue(':phone', $phone, PDO::PARAM_STR);
            $updateStatement->bindValue(':zip', $zip, PDO::PARAM_STR);

            $updateStatement->bindValue(':country', $country, PDO::PARAM_STR);
            $updateStatement->bindValue(':customerid', $customerid, PDO::PARAM_STR);

            $updateStatement->bindValue(':id', $id, PDO::PARAM_INT);
            $updateStatement->execute();

            header("Location: shipment-view.php");
            exit();
        } catch (PDOException $e) {
            echo "Error updating shipment: " . $e->getMessage();
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
                        <h4 class="card-title">Update shipment</h4>
                        <form method="post" class="container mt-md-5">
                            <h1></h1>


                            <div class="form-group">
                                <label for="firstname"> first name </label>
                                <input class="form-control" type="text" name="firstname"
                                    value="<?php echo ($shipment['firstname']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="lastname"> last name</label>
                                <input class="form-control" type="text" name="lastname"
                                    value="<?php echo ($shipment['lastname']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="phone"> phone </label>
                                <input class="form-control" type="text" name="phone"
                                    value="<?php echo ($shipment['phone']) ?>" required>
                            </div>



                            <div class="form-group">
                                <label for="address"> last name</label>
                                <input class="form-control" type="text" name="address"
                                    value="<?php echo ($shipment['address']) ?>" required>
                            </div>


                            <div class="form-group">
                                <label for="city">city </label>
                                <input class="form-control" type="text" name="city"
                                    value="<?php echo ($shipment['city']) ?>" required>
                            </div>



                            <div class="form-group">
                                <label for="country">country</label>
                                <input class="form-control" type="text" name="country"
                                    value="<?php echo ($shipment['country']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="zip"> zip</label>
                                <input class="form-control" type="text" name="zip"
                                    value="<?php echo ($shipment['zip']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="Shipmentdate"> Shipment date</label>
                                <input class="form-control" type="date-time" name="Shipmentdate"
                                    value="<?php echo ($shipment['Shipmentdate']) ?>" required>
                            </div>


                            <div class="form-group">
                                <label for="customerid">customerid</label>
                                <input class="form-control" type="number" name="customerid"
                                    value="<?php echo ($shipment['customerid']) ?>" required>
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