<?php
// Start or resume the session
session_start();
?>
<header>
	<!-- Header desktop -->
	<div style="position:relative; margin-bottun:20px;top:0px">


	<div class="container-menu-desktop">

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">

				
				<!-- <a href="#" class="logo">
					<img src="=/watch2.png" alt="IMG-LOGO">
				</a> -->

				<!-- Menu desktop -->
				<div class="menu-desktop m-l-100">
					<ul class="main-menu">
						<li class="active-menu">
							<a href="home.php">Home</a>
						</li>

						<li>
							<a href="../products/product_copy.php">Shop</a>
						</li>


						<li>
							<a href="../yousef/about.php">About</a>
						</li>

						<li>
							<a href="../yousef/contact.php">Contact</a>
						</li>
					</ul>
				</div>

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m">
					<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div> -->
					<a href="../cart/shoping-cart.php">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " data-notify="2">
							<!--  icon-header-noti js-show-cart  -->
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</a>
					<a href="whishlist.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 "
						data-notify="0"><!--  icon-header-noti   -->
						<i class="zmdi zmdi-favorite-outline"></i>
					</a>

					<ul class="main-menu">
						<?php if (isset($_COOKIE['userid'])): ?>
							<li>
								<a href="../sara/profile_info.php">Profile</a>
							</li>
							<li>
								<a href="logout.php">Logout</a>
							</li>
						<?php else: ?>
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
			<a href="index.html"><img src="watches\watch2.png" alt="IMG-LOGO"></a>
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


	</div>

</header>
<?php
if (isset($_POST['Logout'])) {
	setcookie('userid', $session_id, time() - $expiration, '/');
	header("Location:home.php");
}
?>