<?php

include "connection.php";

try {
	$querySelectCategory = "SELECT * FROM category WHERE 1";
	$querySelectImage = "SELECT image FROM product WHERE 1 LIMIT 3";

	$stmtCategory = $pdo->prepare($querySelectCategory);
	$stmtImages = $pdo->prepare($querySelectImage);

	$stmtCategory->execute();
	$stmtImages->execute();

	$resultCategory = $stmtCategory->fetchAll(PDO::FETCH_ASSOC);
	$resultImages = $stmtImages->fetchAll(PDO::FETCH_ASSOC);

	// if($resultImages->num_rows > 0){
	// 	while($row = $resultImages->FETCH_ASSOC()){
	// 		<img src="data:image/jpg;charset=utf8;base64,<?php base64_encode ($resultImmages['image']); "
	// 	}
	// }

	// while($row = $stmtCategory->fetch

	// $conn = null;
	// $stmtCategory = null;
	// var_dump($resultCategory);
	// print_r($resultCategory) ;

} catch (PDOException $e) {

	echo "Error: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../watchicon.png" />
	<!--===============================================================================================-->
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
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<!--===============================================================================================-->

</head>

<body class="animsition">

	<?php include 'nav.php';


	// Save the current URL in a session variable
	$_SESSION['current_url'] = $_SERVER['REQUEST_URI']; ?><!-- navbar -->



	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<!-- <div class="item-slick1" style="background-image: url(imags/img-men-watches/c3.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div> -->

				<div class="item-slick1" style="background-image: url(imags/img-men-watches/c5.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn"
								data-delay="800">
								<span class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									2023
								</span>
							</div>
							<br>
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="../products/product.php?id=1"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/banner-07.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft"
								data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season

								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight"
								data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="../products/product.php?id=2"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<h2 class="text-center mb-5">Categories</h2>
			<div class="row">
				<?php foreach ($resultCategory as $category): ?>
					<div style="margin:auto" class="col-md-6 col-lg-4 p-b-30">
						<!-- Block1 -->
						<div class="block1 position-relative">
							<div class="wrap-pic-w">
								<a href="../products/product.php?id=<?php echo $category['id'] ?>" class="block1-img-link">
									<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($category['image']); ?>"
										alt="Category Image" class="category-image">
								</a>
								<div class="overlay"></div>
								<a href="../products/product.php?id=<?php echo $category['id'] ?>"
									class="block1-txt d-flex flex-column justify-content-between p-4">
									<div class="block1-txt-child1">
										<span class="block1-name ltext-102">
											<?= $category['Categoryname'] . "<br>" ?>
										</span>
										<span class="block1-info stext-102">
											<?php echo $category['description']; ?>
										</span>
									</div>
									<div class="block1-txt-child2 mt-3">
										<div class="block1-link stext-101 cl0">
											Shop Now
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>





	<!-- Fetch start -->

	<?php
	$sql = "SELECT * FROM product";
	$stmt = $pdo->query($sql);
	$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

	?>

	<!-- products-->
	<div class="container" id="new">

		<h2 style="text-align: center;margin-bottom:50px">New Arrival</h2>
		<div class="row isotope-grid m-b-50">
			<!-- Query the database to retrieve image data from the "product" table -->
			<?php $result = $pdo->query("SELECT image,price,Productname,id FROM product ORDER BY id DESC LIMIT 8");

			//<!-- Fetch all start-->
			
			// Fetch all rows from the query result and store them in the $product array
			$product = $result->fetchAll(PDO::FETCH_ASSOC); ?>
			<?php foreach ($product as $products) { ?>

				<div style="margin:10px 5px;box-shadow:0px 1px 2px ;  width: 24%;"
					class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women h-0.5">
					<!-- Block2 -->
					<div class="block2">

						<?php
						if ($result->rowCount() > 0) {
							?>

							<div class="block2-pic hov-img0">
								<a href="../products/product-detail.php?id=<?php echo $products['id'];
								?>"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($products['image']); ?>"/></a>

								<a href="../cart/addtocart.php?id=<?php echo $products['id'] ?>"
									class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 mr-2"
									style="font: size 30px;px">
									<i class="zmdi zmdi-shopping-cart-plus" style="font-size:20px;color:#717fe0;"></i>
								</a>
							<?php } ?>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">

							<div class="block2-txt-child1 flex-col-l">
								<a href="../products/product-detail.php?id=<?php echo $products['id'] ?>"
									class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 "
									style="overflow:hidden; width:200px;height: 15px;">
									<?php echo $products['Productname']; ?>
								</a>

								<span class="stext-105 cl3">
									$
									<?php echo $products['price']; ?>

								</span>
							</div>
							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
										alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png"
										alt="ICON">
								</a>
							</div>

						</div>
					</div>
				</div>

			<?php } ?>
		</div>

	</div>


	<?php

	if (isset($_COOKIE['userid'])) {
		$user = $_COOKIE['userid'];
		unset($_SESSION['whishlist']);


		$query1 = "SELECT product.image, product.Productname
    FROM product
    INNER JOIN wishlist ON product.id = wishlist.productid 
    WHERE wishlist.customerid = $user";

		$stmt1 = $pdo->prepare($query1);

		$stmt1->execute();

		$wishlistItems1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
		?>

		<section class="bg0 p-t-23 p-b-140" id="favourites">
			<div class="container">
				<h2 style="text-align:center;margin-bottom:50px">Favourites</h2>
				<div class="wishlist-slider">
					<?php foreach ($wishlistItems1 as $item): ?>
						<div class="wishlist-item">
							<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($item['image']); ?> " />
							<h2>
								<?php echo $item['Productname']; ?>
							</h2>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php } ?>




	<?php include './footer.php' ?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



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

	<script>
		$

		window.location.hash = '#new'
	</script>|
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->


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