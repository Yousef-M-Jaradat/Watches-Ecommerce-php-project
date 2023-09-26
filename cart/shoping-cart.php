<?php include 'connection.php';

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../watchicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!--===============================================================================================-->
</head>

<body class="animsition">
    <!-- Header -->
    <!-- Shoping Cart -->
    <?php include 'nav.php' ;
    $_SESSION['current_url'] = $_SERVER['REQUEST_URI']; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" style="margin-top:200px">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>
                            <?php
                            if (isset($_COOKIE['userid'])) {
                                
                                $user =  $_COOKIE['userid'];
                                $query = "SELECT product.Productname, product.price, product.image,cart.productid ,cart.quantity
                                FROM cart 
                                INNER JOIN product  ON cart.productid = product.id
                                WHERE cart.customerid = ?";
                                $statement = $pdo->prepare($query);
                                $statement->execute([$user]);
                                $cartItems = $statement->fetchAll(PDO::FETCH_ASSOC);
                            } elseif (isset($_SESSION['cart'])) {

                                $cartItems = $_SESSION['cart'];
                            }
                            ?>
                            <?php
                            if (isset($cartItems)) {
                                foreach ($cartItems as $products) { ?>
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($products['image']) ?>"
                                                    alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2">
                                            <?php echo $products['Productname'] ?>
                                        </td>
                                        <td class="column-3">
                                            <?php echo $products['price'] . 'JD' ?>
                                        </td>
                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <a href="quantity.php?minusid=<?php echo $products['productid'] ?>">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                                        name="minus">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                </a>
                                            </div>
                                            <input type="hidden" name="productKey" value="<?php echo $productKey ?>">

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="qty"
                                                value="<?php echo $products['quantity'] ?>">

                                            <a href="quantity.php?plusid=<?php echo $products['productid'] ?>">
                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </a>
                            </div>
                            </td>
                            <td class="column-5">
                                <?php echo (int) ($products['price'] * $products['quantity']) . 'JD' ?>
                            </td>
                            <td class="column-5">

                            </td>
                            <td><a href="deletecart.php?delid=<?php echo $products['productid'] ?>">
                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="bi bi-trash"></i>
                                </a>
                        </div>
                        </td>

                        </tr>
                    <?php }
                            } ?>
                </table>
            </div> <a href="../products/product_copy.php">
            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">


                <button type="button"
                    class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                    name="updatecart">
                    Shop More
                </button>
            </div></a>
        </div>
    </div>

    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm" style="margin-top:200px">
            <h4 class="mtext-109 cl2 p-b-30">

                Cart Totals
            </h4>

            <div class="flex-w flex-t bor12 p-b-13">
                <div class="size-208">
                    <span class="stext-110 cl2">
                        Subtotal:
                    </span>
                </div>

                <div class="size-209">
                    <span class="mtext-110 cl2">
                        <?php $Subtotal = 0;

                        if (isset($cartItems)) { ?>
                            <?php foreach ($cartItems as $products) {
                                $Subtotal += (int) ($products['price'] * $products['quantity']);
                            }
                        }
                        echo $Subtotal . 'JD'; ?>
                    </span>
                </div>
                <div class="size-208">
                    <span class="stext-110 cl2">
                        Fees: 
                    </span>
                </div>

                <div class="size-209">
                    <span class="mtext-110 cl2">
                       0JD
                    </span>
                </div>
            </div>
            <div class="flex-w flex-t p-t-27 p-b-33">
                <div class="size-208">
                    <span class="mtext-101 cl2">
                        Total:
                    </span>
                </div>

                <div class="size-209 p-t-1">
                    <span class="mtext-110 cl2">
                        <?php $total = 0;
                        if (isset($cartItems)) { ?>
                            <?php foreach ($cartItems as $products) {
                                $total += (int) ($products['price'] * $products['quantity']);
                            }
                        }
                        echo $total . 'JD';
                        if (!isset($_SESSION['TOTAL'])) {
                            $_SESSION['TOTAL'] = $total;
                        } else {
                            $_SESSION['TOTAL'] = $total;
                        } ?>
                    </span>
                </div>
            </div>
            <?php if (isset($_COOKIE['userid'])) {
                $sql = "SELECT COUNT(*) FROM cart";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $rowCount = $stmt->fetchColumn();
                if ($rowCount > 0) { ?>
                    <a href="../check out/checkout.php" <button
                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer ">
                        Proceed to Checkout
                        </button></a>
                <?php } else { ?>
                    <a href="#" <button
                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer  js-addcart-detail">
                        Proceed to Checkout
                        </button></a>
                <?php }
            } else { ?>
                <a href="../sara/login.php"><button
                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </button></a>
            <?php } ?>
        </div>
    </div>
    </div>
    </div>

    <!-- Footer -->
   
    <!--  -->

 <?php include 'footer.php' ?>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>

    <!--===============================================================================================-->


    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addcart-detail').each(function () {
            var nameProduct = $(this).parent().parent().parent().parent().find().html();
            $(this).on('click', function () {
                swal("The Cart Is Empty !");
            });
        });

    </script>

</body>

</html>