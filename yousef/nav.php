<?php
// Start or resume the session
include 'connection.php';
session_start();
?>
<header>
	<!-- Header desktop -->
	<div class="container-menu-desktop">

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">

				<!-- Logo desktop -->
				<a href="#" class="logo">
					<img src="../watch2.png" alt="IMG-LOGO">
				</a>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li>
							<a href="home.php">Home</a>
						</li>

						<li>
							<a href="../products/product.php">Shop</a>
						</li>


						<li>
							<a href="about.php">About</a>
						</li>

						<li>
							<a href="contact.php">Contact</a>
						</li>
					</ul>
				</div>

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m">
					<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div> -->
					<a href="../cart/shoping-cart.php">

						<?php // Check if the user is logged in
						// if (isset($_SESSION['loginstatus']) && $_SESSION['loginstatus'] == 1) {
						// User is logged in, check if userid cookie is set
						if (isset($_COOKIE['userid'])) {
							$user_id = $_COOKIE['userid'];

							// Fetch cart count from the database
							$query = "SELECT COUNT(*) AS cart_count FROM cart WHERE customerid = ?";
							$stmt = $pdo->prepare($query);
							$stmt->bindParam(1, $user_id);
							$stmt->execute();
							$result = $stmt->fetch(PDO::FETCH_ASSOC);

							$cart_count = $result['cart_count'];
						} else {
							// User is logged in but userid cookie is not set, handle accordingly
							$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
						}
						// } else {
						// // User is not logged in, get cart count from session
						// $cart_count = isset($_SESSION['session_id_cart']) ? count($_SESSION['session_id_cart']) : 0;
						// }

						// Display the cart count
						?>

						<!-- Icon header -->
						<div class="wrap-icon-header flex-w flex-r-m">
							<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search" data-notify="2">
							<i class="zmdi zmdi-search"></i>
						</div> -->
							<a href="../cart/shoping-cart.php">
								<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?php echo $cart_count ?>">
									<i class="zmdi zmdi-shopping-cart"></i>

								</div>
							</a>
							<a href="whishlist.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " data-notify="0"><!--  icon-header-noti   -->
								<i class="zmdi zmdi-favorite-outline"></i>
							</a>

							<ul class="main-menu">
								<?php if (isset($_COOKIE['userid'])) : ?>
									<li>
										<a href="../sara/profile_info.php">Profile</a>
									</li>
									<li>
										<a href="logout.php">Logout</a>
									</li>
								<?php else : ?>
									<li>
										<a href="../sara/login.php">Login</a>
									</li>
									<li>
										<a href="../sara/registration.php">Register</a>
									</li>
								<?php endif; ?>
							</ul>
							</ul>
						</div>
			</nav>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->
		<div class="logo-mobile">
			<a href="home.php"><img src="../watch2.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div> -->

			<a href="cart.php">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="44">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</a>

			<a href="#favourites" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0">
				<i class="zmdi zmdi-favorite-outline"></i>
			</a>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>

	<!-- Menu Mobile -->
	<div class="menu-mobile">


		<ul class="main-menu-m">
			<li>
				<a href="home.php">Home</a>
				<span class="arrow-main-menu-m">
					<i class="fa fa-angle" aria-hidden="true"></i>
				</span>
			</li>

			<li>
				<a href="product.php">Shop</a>
			</li>


			<li>
				<a href="about.html">About</a>
			</li>

			<li>
				<a href="contact.html">Contact</a>
			</li>
		</ul>
	</div>


</header>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		var currentPage = window.location.pathname.split("/").pop(); // Get the current page filename
		var menuItems = document.querySelectorAll(".menu-desktop a");

		for (var i = 0; i < menuItems.length; i++) {
			if (menuItems[i].getAttribute("href") === currentPage) {
				menuItems[i].classList.add("active");
			}
		}
	});
</script>
<?php
if (isset($_POST['Logout'])) {
	setcookie('userid', $session_id, time() - $expiration, '/');
	header("Location:home.php");
}
?>