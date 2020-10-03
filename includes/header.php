<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="asset/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Ruft Blog</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500|Rubik:500" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="asset/css/linearicons.css">
	<link rel="stylesheet" href="asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="asset/css/bootstrap.css">
	<link rel="stylesheet" href="asset/css/magnific-popup.css">
	<link rel="stylesheet" href="asset/css/nice-select.css">
	<link rel="stylesheet" href="asset/css/animate.min.css">
	<link rel="stylesheet" href="asset/css/owl.carousel.css">
	<link rel="stylesheet" href="asset/css/main.css">
</head>

<body>
	<!--================ Start header Top Area =================-->
	<section class="header-top">
		<div class="container box_1170">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<a href="index.html" class="logo">
						<img src="asset/img/logo.png" alt="">
					</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 search-trigger">
					<a href="#" class="search">
						<i class="lnr lnr-magnifier" id="search"></i></a>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!--================ End header top Area =================-->

	<!-- Start header Area -->
	<header id="header">
		<div class="container box_1170 main-menu">
			<div class="row align-items-center justify-content-center d-flex">
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="index.php">Home</a></li>
						<li><a href="category.html">Category</a></li>
						<li><a href="archive.html">Archive</a></li>
						<li class="menu-has-children"><a href="">Pages</a>
							<ul>
								<li><a href="elements.html">Elements</a></li>
							</ul>
						</li>
						<li class="menu-has-children"><a href="">Blog</a>
							<ul>
								<li><a href="blog-details.html">Blog Details</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
						<?php
						if (isset($_SESSION['name']) && isset($_SESSION['role']) && isset($_SESSION['login'])) {
							if ($_SESSION['role'] != 5) {
						?>
								<li><a href="dashboard/index.php">Dashboard</a></li>
							<?php
							}
							?>
							<li>
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?= $_SESSION['name'] ?>
								</button>
								<div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
									<div class="d-flex flex-column">
									<a class="dropdown-item text-dark" href="logout.php">Log Out</a>
									</div>
									
								</div>
							</div>
							</li>
							
						<?php
						}
						?>

						<li><a href="login.php">login</a></li>
						<li><a href="register.php">register</a></li>
					</ul>
				</nav>
			</div>
		</div>

		<div class="search_input" id="search_input_box">
			<div class="container box_1170">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End header Area -->