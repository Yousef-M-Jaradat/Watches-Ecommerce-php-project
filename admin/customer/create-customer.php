<!doctype html>
<html lang="en">

<head>
    <title>create Category</title>
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
                        <h4 class="card-title">Create customer</h4>
                        <form method="post" action="process.php" enctype="multipart/form-data"
                            class="container mt-md-5">

                            <div class="form-group">
                                <label for="firstname">first name</label>
                                <input class="form-control" type="text" name="firstname" required>
                            </div>

                            <div class="form-group">
                                <label for="lastname"> last name</label>
                                <input class="form-control" type="text" name="lastname" required>
                            </div>

                            <div class="form-group">
                                <label for="email"> email </label>
                                <input class="form-control" type="text" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="password"> password</label>
                                <input class="form-control" type="pasword" name="password" required>
                            </div>

                            

                            <!-- <div class="form-group">
                                <label for="role"> role</label>
                                <input class="form-control" type="text" name="role" required>
                            </div> -->

                            <div class="form-group">
                                <label for="role"> role</label>
                                <select class="form-control" name="role">
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                            </div>




                            <button class="btn btn-primary" type="submit">Create</button>

                            <a class="btn btn-success" href="customer-view.php">back to home</a>
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