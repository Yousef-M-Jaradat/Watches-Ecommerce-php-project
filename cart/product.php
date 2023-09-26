<?php include 'connection.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="container">
    <?php
    $query = "SELECT * FROM product";
    $result=$pdo->query($query);
    $products=$result->fetchAll(PDO::FETCH_ASSOC);
    if ($products > 0) { ?>
        <table class="table border">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">description</th>
                    <th scope="col">stock</th>
                    <th scope="col">category-id</th>
                    <th scope="col">color</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>


            <tbody>
                <?php foreach($products as $row) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['Productname'] ?>
                        </td>
                        <td>
                            <?php echo $row['price'] .'JD'?>
                        </td>
                        <td>
                            <?php echo $row['description'] ?>
                        </td>
                        <td>
                            <?php echo $row['stockqty'] ?>
                        </td>
                        <td>
                            <?php echo $row['categoryid'] ?>
                        </td>
                        <td>
                            <?php echo $row['color'] ?>
                        </td>
                        <td>
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['image'])   ?>" alt="" style="width:200px">
                        </td>
                        <td><a href="addtocart.php?id=<?php echo $row['id'] ?>"><button type='button'
                                    style="color: blue; background-color:white; border:1px solid blue">Add to cart</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } ?>
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
