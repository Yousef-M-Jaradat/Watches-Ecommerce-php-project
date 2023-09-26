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

<!-- ?php include 'header.php'; ?> -->

<!-- Fetch start -->

<?php




$sql = "SELECT * FROM product";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<body class="animsition">


	<!-- Product -->
	<!-- Product -->
	<?php include 'nav.php';

	$_SESSION['current_url'] = $_SERVER['REQUEST_URI']; ?>

	<div class="bg0 m-t-180 m-b-50">
		<div class="container">
			<div class="navbar navbar-expand-lg navbar-light bg-light ">
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle m-l-20" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Similar Category
							</a>
							<div class="dropdown-menu" aria-labelledby="categoryDropdown">
								<a class="dropdown-item" href="product.php" value="allProduct">All Products
									<!-- <span class="badge badge-light">142</span> -->
								</a>
								<a class="dropdown-item" href="product.php?id=1" value="1">Woman
									<!-- <span class="badge badge-light">142</span> -->
								</a>
								<a class="dropdown-item" href="product.php?id=2" value="2">Men
									<!-- <span class="badge badge-light">3</span> -->
								</a>
								<a class="dropdown-item" href="product.php?id=3" value="3">Kids
									<!-- <span class="badge badge-light">32</span> -->
								</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle m-l-20" href="#" id="colorDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Color Check
							</a>
							<div class="dropdown-menu" aria-labelledby="colorDropdown">
								<a class="dropdown-item" href="product.php?color=Red" value="Red">
									<span class="form-check-label">Red</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Silver" value="Silver">
									<span class="form-check-label">Silver</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Black" value="Black">
									<span class="form-check-label">Black</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Gold" value="Gold">
									<span class="form-check-label">Gold</span>
								</a>
								<a class="dropdown-item" href="product.php?color=Blue" value="Blue">
									<span class="form-check-label">Blue</span>
								</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle m-l-20" href="#" id="colorDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Price Check
							</a>
							<div class="dropdown-menu" aria-labelledby="colorDropdown">
								<a class="dropdown-item" href="product.php?price1=0&price2=50" value="50">
									<span class="form-check-label">0$-50$</span>
								</a>
								<a class="dropdown-item" href="product.php?price1=50&price2=100" value="100">
									<span class="form-check-label">50$-100$</span>
								</a>
								<a class="dropdown-item" href="product.php?price1=101&price2=150" value="150">
									<span class="form-check-label">100$-150$</span>
								</a>
								<a class="dropdown-item" href="product.php?price1=151&price2=200" value="200">
									<span class="form-check-label">150$-200$</span>
								</a>
								<a class="dropdown-item" href="product.php?price1=201&price2=1000" value="1000">
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

	<div class="container m-t-50 m-b-50" id="new">
		<div class="divSearch">

			<div class="row isotope-grid m-auto " id="search_filed">

				<?php
				if (isset($_GET['id'])) {
					$categoryid = $_GET['id'];

					try {
						$cardsPerPage = 8;
						$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
						$offset = ($currentPage - 1) * $cardsPerPage;
						// Construct the SQL query for fetching filtered products by color
						$sql = "SELECT * FROM product WHERE categoryid = :id LIMIT :offset, :limit";
						$stmt = $pdo->prepare($sql);
						$stmt->bindParam(':id', $categoryid, PDO::PARAM_STR);
						$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
						$stmt->bindParam(':limit', $cardsPerPage, PDO::PARAM_INT);
						$stmt->execute();
				
						$categoryDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
						// Construct the SQL query for counting total records with the given color
						$countQuery = "SELECT COUNT(*) AS total FROM product WHERE categoryid = :id";
						$countStmt = $pdo->prepare($countQuery);
						$countStmt->bindParam(':id', $categoryid, PDO::PARAM_STR);
						$countStmt->execute();
						$totalRecords = $countStmt->fetchColumn();
				
						// Calculate the total number of pages
						$totalPages = ceil($totalRecords / $cardsPerPage);
					} catch (PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
				}
				// ... Your database connection and other setup ...
				
				elseif (isset($_GET['color'])) {
					$color = $_GET['color'];
				
					try {
						$cardsPerPage = 8;
						$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
						$offset = ($currentPage - 1) * $cardsPerPage;
						// Construct the SQL query for fetching filtered products by color
						$sql = "SELECT * FROM product WHERE color = :color  LIMIT :offset, :limit";
						$stmt = $pdo->prepare($sql);
						$stmt->bindParam(':color', $color, PDO::PARAM_STR);
						$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
						$stmt->bindParam(':limit', $cardsPerPage, PDO::PARAM_INT);
						$stmt->execute();
				
						$categoryDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
						// Construct the SQL query for counting total records with the given color
						$countQuery = "SELECT COUNT(*) AS total FROM product WHERE color = :color";
						$countStmt = $pdo->prepare($countQuery);
						$countStmt->bindParam(':color', $color, PDO::PARAM_STR);
						$countStmt->execute();
						$totalRecords = $countStmt->fetchColumn();
				
						// Calculate the total number of pages
						$totalPages = ceil($totalRecords / $cardsPerPage);
					} catch (PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
				}
				
				elseif (isset($_GET['price1']) && isset($_GET['price2'])) {
					$price1 = $_GET['price1'];
					$price2 = $_GET['price2'];

				try {
						$cardsPerPage = 8;
						$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
						$offset = ($currentPage - 1) * $cardsPerPage;
				
						// Construct the SQL query for fetching filtered products by color
						$sql = "SELECT * FROM product WHERE price BETWEEN :price1 AND :price2 LIMIT :offset, :limit";
						$stmt = $pdo->prepare($sql);
						$stmt->bindParam(':price1', $price1, PDO::PARAM_STR);
						$stmt->bindParam(':price2', $price2, PDO::PARAM_STR);
						$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
						$stmt->bindParam(':limit', $cardsPerPage, PDO::PARAM_INT);
						$stmt->execute();
				
						$categoryDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
						// Construct the SQL query for counting total records with the given color
						$countQuery = "SELECT COUNT(*) AS total FROM product WHERE price BETWEEN :price1 AND :price2";
						$countStmt = $pdo->prepare($countQuery);
						$countStmt->bindParam(':price1', $price1, PDO::PARAM_STR);
						$countStmt->bindParam(':price2', $price2, PDO::PARAM_STR);
						$countStmt->execute();
						$totalRecords = $countStmt->fetchColumn();
				
						// Calculate the total number of pages
						$totalPages = ceil($totalRecords / $cardsPerPage);
					} catch (PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
				} else 
				{
					$cardsPerPage = 8;

					// Get the current page number from the query parameter
					$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
					$offset = ($currentPage - 1) * $cardsPerPage;
	
					try {
						$sql = "SELECT * FROM product LIMIT :offset, :limit";
						$stmt = $pdo->prepare($sql);
						$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
						$stmt->bindParam(':limit', $cardsPerPage, PDO::PARAM_INT);
						$stmt->execute();
	
						$categoryDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
						$countQuery = "SELECT COUNT(*) AS total FROM product";
						$countStmt = $pdo->query($countQuery);
						$totalRecords = $countStmt->fetchColumn();					// Count the total number of records
	
						// Calculate the total number of pages
						$totalPages = ceil($totalRecords / $cardsPerPage);
					} catch (PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
				}
			

				?>


				<?php

				$result = $pdo->query("SELECT image FROM product ORDER BY id DESC");
				$product = $result->fetchAll(PDO::FETCH_ASSOC);

?>
				<div class="row ">
				<?php foreach ($categoryDetails as $products) { ?>
					<?php if ($result->rowCount() > 0) { ?>
						<div style="margin: 10px 5px; box-shadow: 0px 1px 8px; width: 24%;"
							class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women h-0.5" style="left:10%">
							<!-- Block2 -->
							<div class="block2 ">
								<div class="block2-pic hov-img0">
									<a href="product-detail.php?id=<?php echo $products['id']; ?>"><img
											src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($products['image']); ?>" /></a>
			
									<a href="../cart/addtocart.php?id=<?php echo $products['id'] ?>"
										class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 mr-2"
										style="font: size 30px;px">
										<i class="zmdi zmdi-shopping-cart-plus"
											style="font-size:20px;color:#717fe0;"></i>
									</a>
								</div>
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class=" col-12">
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
									</div>
			
									<div class="row block2-txt-child2 flex-r p-t-3 justify-content-between  ">
										<div class="row justify-content-between">
			
											<a href="razan.php/?id=<?php echo $products['id'] ?>"
												class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 "
												style="display:hidden ">
												<img class="icon-heart1 dis-block trans-04"
													src="images/icons/icon-heart-01.png" width="25px" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l "
													src="images/icons/icon-heart-02.png" width="25px" alt="ICON">
											</a>
			
			
										</div>
									</div>
			
								</div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			
		</div>
	</div>
	</div>
	<div class="pagination m-b-20">
		<?php for ($page = 1; $page <= $totalPages; $page++) { ?>
			<a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
		<?php } ?>
	</div>
	<?Php include 'footer.php' ?>

	<!-- Fetch all end-->

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
		$(".js-select2").each(function() {
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
		$('.gallery-lb').each(function() { // the containers for all your galleries
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
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<script>
		// Extract the last part of the URL
		var url = window.location.href;
		var parts = url.split('?');
		var lastPart = parts[parts.length - 1];
		console.log(lastPart);
		// Send the last part to the PHP script
		// $.ajax({
		// 	url: "your-php-script.php",
		// 	method: "POST",
		// 	data: {
		// 		lastPart: lastPart
		// 	},
		// 	success: function(response) {
		// 		console.log("Data sent successfully:", response);
		// 	}
		// });
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var currentCategory = window.location.search.split("=").pop(); // Get the current category from the URL query parameter
			var menuItems = document.querySelectorAll(".dropdown-menu a");

			for (var i = 0; i < menuItems.length; i++) {
				var valueAttribute = menuItems[i].getAttribute("value");
				console.log("Value attribute for menu item " + (i + 1) + ": " + valueAttribute);
				if (valueAttribute == currentCategory) {
					menuItems[i].classList.add("active");
				}

			}

			console.log("Current Category:", currentCategory);
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>