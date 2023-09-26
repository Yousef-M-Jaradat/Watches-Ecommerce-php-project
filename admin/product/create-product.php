<!doctype html>
<html lang="en">

<head>
    <title>create product</title>
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
                        <h4 class="card-title">Create Product</h4>
                        <form method="post" action="process.php" enctype="multipart/form-data"
                            class="container mt-md-5">
                            <div class="form-group">
                                <label for="Productname">Product Name</label>
                                <input class="form-control" type="text" name="Productname" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descriptions</label>
                                <input class="form-control" type="text" name="descriptions" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descriptionl</label>
                                <input class="form-control" type="text" name="descriptionl" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control" type="number" name="price" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="stockqty">Stock Quantity</label>
                                <input class="form-control" type="number" name="stockqty" required>
                            </div> -->
                            <div class="form-group">
                                <label for="categoryid">categoryid</label>
                                <input class="form-control" type="number" name="categoryid" required>
                            </div>
                            <div class="form-group">
                                <label for="color">Color</label>
                                <input class="form-control" type="text" name="color" required>
                            </div>

                            <div class="form-group">
                                <label for="image">image</label>
                                <input class="form-control" type="file" name="image" required>
                            </div>

                            <div class="form-group">
                                <label for="image2">image 3</label>
                                <input class="form-control" type="file" name="image2" required>
                            </div>

                            <div class="form-group">
                                <label for="image3">image 3</label>
                                <input class="form-control" type="file" name="image3" required>
                            </div>

                            <button class="btn btn-primary" type="submit">Create</button>

                            <a class="btn btn-success" href="product-view.php">back to home</a>
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