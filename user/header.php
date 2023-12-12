<?php
session_start();
include "../admin/connections.php";
$max = 0;
if (isset($_SESSION["cart"])) {
	$max = sizeof($_SESSION["cart"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<!-- Stylesheets -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link href="assets/vendors/flat-icon/flaticon.css" rel="stylesheet">

	
	<!-- Rev slider css -->
	<link href="assets/vendors/revolution/css/settings.css" rel="stylesheet">
	<link href="assets/vendors/revolution/css/layers.css" rel="stylesheet">
	<link href="assets/vendors/revolution/css/navigation.css" rel="stylesheet">

	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">

	<link rel="shortcut icon" href="assets/images/logo-02.png" type="image/x-icon">
	<link rel="icon" href="assets/images/logo-02.png" type="image/x-icon">

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&amp;family=Open+Sans:wght@400;600;700;800&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
	<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

	<div class="page-wrapper">

		<!-- Preloader -->
		<div class="preloader"></div>

		<header class="main-header">
			<!--Header Top-->
			<div class="header-top" style="background-color:#f2e39c; color:black">
				<div class="auto-container clearfix">
					<div class="top-left">
						<!-- Info List -->
						<ul class="info-list">

							<li><a href="mailto:info@abc.co.in" style="color: black"><span class="icon far fa-envelope"></span>
									info@abc.co.in</a></li>
						</ul>
					</div>
					<div class="top-right clearfix">

						<!--Social Box-->
						<ul class="social-box">
							<li><a href="./login.php" style="color: black"><span class="fa fa-user-alt"></span></a></li>
						</ul>
						<div class="option-list">
							<!-- Cart Button -->
							<div class="cart-btn">
								<a href="view_cart.php" class="icon flaticon-shopping-cart" style="color: black"><span class="total-cart" style="background-color: #a40301;color:white">
										<?php echo $max ?>
									</span></a>
							</div>
							<!-- Search Btn -->

						</div>
					</div>
				</div>
			</div>
			<!-- End Header Top -->

			<!-- Header Upper -->
			<div class="header-upper">
				<div class="inner-container">
					<div class="auto-container clearfix">
						<!--Info-->
						<div class="logo-outer">
							<div class="logo" style="margin-top: -20px;"><a href="index.php"><img src="assets/images/logo-02.png" alt="" title=""></a></div>
						</div>

						<!--Nav Box-->
						<div class="nav-outer clearfix">
							<!-- Main Menu -->
							<nav class="main-menu navbar-expand-md navbar-light">
								<div class="navbar-header">
									<!-- Togg le Button -->
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="icon flaticon-menu"></span>
									</button>
								</div>

								<div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
									<ul class="navigation clearfix">
										<li class="current dropdown"><a href="./index.php">Home</a>
										</li>


										<li><a href="gallery.html">Gallery</a></li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</div>
							</nav>
							<!-- Main Menu End-->

							<div class="outer-box">
								<div class="order">
									Order Now
									<span><a href="tel:1800-123-4567">1800 123 4567</a></span>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!--End Header Upper-->

			<!--Sticky Header-->
			<div class="sticky-header">
				<div class="auto-container clearfix">
					<!--Logo-->
					<div class="logo pull-left">
						<a href="index.php" class="img-responsive"><img src="assets/images/logo-02.png" alt="" title="" height="90" width="90" style="margin-top: -10px;"></a>
					</div>

					<!--Right Col-->
					<div class="right-col pull-right">
						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-md">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
								<ul class="navigation clearfix">
									<li class="current dropdown"><a href="./index.php">Home</a>
										
									</li>


									<li><a href="gallery.html">Gallery</a></li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</div>
						</nav><!-- Main Menu End-->
					</div>

				</div>
			</div>
			<!--End Sticky Header-->

		</header>
		<!-- End Main Header -->