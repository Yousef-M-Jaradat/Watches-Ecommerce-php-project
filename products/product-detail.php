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
	<title>Product Detail</title>
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

<?php include 'nav.php'; 
	
	$_SESSION['current_url'] = $_SERVER['REQUEST_URI']; ?>

<?php
$sql = "SELECT * FROM product";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="animsition" style="margin-top:100px">

	
<?php 
if(isset($_GET['id'])){

}
?>
	<!-- Fetch start -->

	<?php
	// for product table:
	if (isset($_GET['id'])) {

		$_SESSION['single-id-cart']=$_GET['id'];
		// echo $_SESSION['single-id-cart'];
		try {
			$productId = $_GET['id'];
			$sql = "SELECT * FROM product WHERE id = :productId";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
			$stmt->execute();
			$productDetails = $stmt->fetch(PDO::FETCH_ASSOC);
			// print_r($productDetails);
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	
	if (isset($_SESSION['single-id-cart'])) {
		try {
			$productId = $_SESSION['single-id-cart'];
			$sql = "SELECT * FROM product WHERE id = :productId";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
			$stmt->execute();
			$productDetails = $stmt->fetch(PDO::FETCH_ASSOC);
			// print_r($productDetails);
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	if (isset($_SESSION['single-id-cart'])) {
		$categoryid = $productDetails['categoryid'];
		try {
			$sql = "SELECT Categoryname FROM category WHERE id = :id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id', $categoryid, PDO::PARAM_INT);
			$stmt->execute();

			$categoryDetails = $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	// for category table:
	if (isset($_GET['id'])) {
		$categoryid = $productDetails['categoryid'];
		try {
			$sql = "SELECT Categoryname FROM category WHERE id = :id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id', $categoryid, PDO::PARAM_INT);
			$stmt->execute();

			$categoryDetails = $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	if(isset($_SESSION['single-id-category'])){
		$categoryid = $_SESSION['single-id-category'];
			try {
				$sql = "SELECT Categoryname,id FROM category WHERE id = :id";
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':id', $categoryid, PDO::PARAM_INT);
				$stmt->execute();
	
				$categoryDetails = $stmt->fetch(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
	}
	?>





	<!-- breadcrumb -->
	<div class="container">


		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="../yousef/home.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<a href="product_copy.php" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo "{$categoryDetails['Categoryname']}" ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo "{$productDetails['Productname']}" ?>
			</span>
		</div>

	</div>


	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<?php
		$result = $pdo->query("SELECT image FROM product ORDER BY id DESC");
		$product = $result->fetch(PDO::FETCH_ASSOC);
		?>
		<div class="container">
			<div class="fav">
				<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
					data-tooltip="Add to Wishlist">
					<i class="zmdi zmdi-favorite"></i>
				</a>
			</div>

			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">

					<div class="p-l-25 p-r-30 p-lr-0-lg">

						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($productDetails['image'])?>">
									<div class="wrap-pic-w pos-relative">
										<img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($productDetails['image'])?>"  alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($productDetails['image'])?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($productDetails['image2'])?>"> 
									<div class="wrap-pic-w pos-relative">
										<img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($productDetails['image2'])?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($productDetails['image2'])?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($productDetails['image3'])?>">
									<div class="wrap-pic-w pos-relative">
										<img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($productDetails['image3'])?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($productDetails['image3'])?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo "{$productDetails['Productname']}" ?>

						</h4>

						<span class="mtext-106 cl2">
							<?php echo "$" . "{$productDetails['price']}" ?>
						</span>
						<div class="tab-content p-t-43">
							<!-- description -->
							<div class="tab-pane fade show active" id="description" role="tabpanel">
								<div class="how-pos2 p-lr-15-md" style="    padding-left: 00px;">
									<p class="stext-102 cl6">
										<?php echo "{$productDetails['descriptions']}" ?>;
									</p>
								</div>
							</div>
							<br>
							<div class="tab-pane fade show active" id="description" role="tabpanel">
								<div class="how-pos2 p-lr-15-md" style="    padding-left: 00px;">
									<p class="stext-102 cl6">
										Color: <?php echo "{$productDetails['color']}" ?>
									</p>
								</div>
							</div>
							<br>
							<div class="tab-pane fade show active" id="description" role="tabpanel">
								<div class="how-pos2 p-lr-15-md" style="    padding-left: 00px;">
									<p class="stext-102 cl6">
										Size: one-size 
									</p>
								</div>
							</div>
							<br>
						<div class="flex-w flex-r-m p-b-10">
							<div class="size-204 flex-w flex-m respon6-next">
							
								<a
									href="../cart/addtocart.php?id=<?php if(isset($_SESSION['single-id-cart'])){
										echo $_SESSION['single-id-cart'];
										}
									else
										echo $_GET['id'] ?>"><button
											class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- description -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
								<?php echo "{$productDetails['descriptionl']}" ?>;
							</p>
						</div>
					</div>

					<!-- - -->
					<?php
					try {

						$sql = "SELECT r.*, CONCAT(u.firstname, ' ', u.lastname) AS customer_name
						FROM review AS r
						JOIN customer AS u ON r.customerid = u.id";
						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach ($reviews as $review) { ?>
							<div class="tab-pane fade" id="reviews" role="tabpanel">
								<div class="row">
									<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
										<div class="p-b-30 m-lr-15-sm">
											<!-- Review -->
											<div class="flex-w flex-t p-b-68">
												<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
													<img src="images/avatar-01.jpg" alt="AVATAR">
												</div>

												<div class="size-207">
													<div class="flex-w flex-sb-m p-b-17">
														<span class="mtext-107 cl2 p-r-20">
															<?php echo $review['customer_name']; ?>
														</span>
													</div>

													<p class="stext-102 cl6">
														<?php echo $review['textrev']; ?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php }
					} catch (PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
					?>
				</div>
			</div>
		</div>
	</section>





	<!-- ?php include 'footer.php'; ?> -->

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