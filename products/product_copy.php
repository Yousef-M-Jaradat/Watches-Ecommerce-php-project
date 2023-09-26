<!-- connection start -->

<?php
$dsn = "mysql:host=localhost;dbname=watches";
$username = "root";
$password = "";

try {
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "Connected successfully";
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>

<!-- connection end -->


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../watchicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>


<?php

$sql = "SELECT * FROM product";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<body class="animsition">


	<!-- Product -->
	<?php include 'nav.php';

	$_SESSION['current_url'] = $_SERVER['REQUEST_URI']; ?>


	<div class="bg0 m-t-100 ">
		<div class="container">
			<!-- <div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<form method="post" action="">
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="category" value="all">
							<a href="product_copy.php">All Products</a>
						</button>
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="category" value="Women">
							<a href="product.php?id=1">Women</a>
						</button>
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="category" value="Men">
							<a href="product.php?id=2">Men</a>
						</button>
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="category" value="Smart">
							<a href="product.php?id=3">Kids</a>
						</button>
						<input type="submit" style="display: none;">
					</form>
				</div>
			</div> -->
			<div class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Similar Category
							</a>
							<div class="dropdown-menu" aria-labelledby="categoryDropdown">
								<a class="dropdown-item" href="product_copy.php">All Products
									<!-- <span class="badge badge-light">142</span> -->
								</a>
								<a class="dropdown-item" href="product.php?id=1">Woman
									<!-- <span class="badge badge-light">142</span> -->
								</a>
								<a class="dropdown-item" href="product.php?id=2">Men
									<!-- <span class="badge badge-light">3</span> -->
								</a>
								<a class="dropdown-item" href="product.php?id=3">Kids
									<!-- <span class="badge badge-light">32</span> -->
								</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="colorDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Color Check
							</a>
							<div class="dropdown-menu" aria-labelledby="colorDropdown">
								<a class="dropdown-item" href="product.php?color=Red">
									<span class="form-check-label">Red</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Silver">
									<span class="form-check-label">Silver</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Black">
									<span class="form-check-label">Black</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Gold">
									<span class="form-check-label">Gold</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Blue">
									<span class="form-check-label">Blue</span>
								</a>

							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle m-l-20" href="#" id="colorDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Price Check
							</a>
							<div class="dropdown-menu" aria-labelledby="colorDropdown">
								<a class="dropdown-item" href="product.php?price1=0&price2=50">
									<span class="form-check-label">0$-50$</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Silver">
									<span class="form-check-label">50$-100$</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Black">
									<span class="form-check-label">100$-150$</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Gold">
									<span class="form-check-label">150$-200$</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Blue">
									<span class="form-check-label">above 200$</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>




			</aside> <!-- col.// -->
		</div>
	</div>


	<!-- Fetch all start-->

	<div class="row isotope-grid" style="margin-right: 5%; margin-left: 5%; margin-top: 100px; ">

		<?php
		$sql = "SELECT * FROM product";
		$stmt = $pdo->query($sql);
		$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($products as $product):
			?>
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women ">
				<div class="block2">

					<?php
					if ($stmt->rowCount() > 0) {
						?>

						<div class="block2-pic hov-img0">
							<a href="product-detail.php?id=<?php echo $product['id'];
							?>"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" /></a>

							<a href="../cart/addtocart.php?id=<?php echo $product['id'] ?>"
								class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 mr-2"
								style="font: size 30px;px">
								<i class="zmdi zmdi-shopping-cart-plus" style="font-size:20px;color:#717fe0;"></i>
							</a>
						<?php } ?>
					</div>
					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.php?id=<?php echo $product['id'];
							?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">

								<?php echo $product['Productname']; ?> </a>

							<span class="stext-105 cl3">

								$
								<?php echo $product['price']; ?>
							</span>

						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png"
									alt="ICON">
							</a>
						</div>
					</div>
				</div>
			</div>


		<?php endforeach; ?>
		<!-- ?php	$categoryDetails = $stmt->fetch(PDO::FETCH_ASSOC);
			foreach ($products as $product) :

	?> -->


	</div>
	</div>


	<!-- Fetch all end-->

	<!-- ?php include 'footer.php'; ?> -->
	<?php include 'footer.php' ?>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function () {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function () { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function (e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function () {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function () {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function () {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>