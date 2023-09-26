<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="process_review.php" method="post">          
        <?php  session_start();
include 'connection.php';
$id = $_SESSION['id'];
$query = "SELECT product.image
FROM cart
INNER JOIN product ON cart.productid = product.id
WHERE cart.customerid = $id";
$result = $pdo->query($query);
$products = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($products as $product){?> 
        <div class="row">
            <div class="col-3">
    <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($product['image'])   ?>" alt="" style="width:100px">
            </div>
            <div class="col-6">
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Very Good</option>
                    <option value="3">3 - Good</option>
                    <option value="2">2 - Fair</option>
                    <option value="1">1 - Poor</option>
                </select><br>

                <label for="review">Your Review:</label><br>
                <textarea id="review" name="review" rows="4" cols="50" required></textarea><br>
                <button type="submit"
                    class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                    name="updatecart">
                    Submit Review
                </button>
                <?php
}
?>
    </form>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
