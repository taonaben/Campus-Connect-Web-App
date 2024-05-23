<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<title>Campus-Connect</title>

	<!-- <link
			href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
			rel="stylesheet"
		/> -->

	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet" />

	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

	<link href="assets/css/style.css" rel="stylesheet" />

	<script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script defer src="assets/js/main.js"></script>
</head>

<body>
	<div class="invisible-items">
		<div id="preloader"></div>

		<div id="mobile-nav">
			<button id="close-nav" class="btn">
				<i class="bi bi-x fs-1 m-2"></i>
			</button>
			<a href="./index.php" class="text-decoration-underline">Home</a>
			<a href="./accomodation.hph">Browse Accomodation</a>
			<a href="./about.php">About</a>
			<a href="./contact.php">Get In Touch</a>
			<a href="./signin.php">SignIn</a>
		</div>

		<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	</div>

	<!--START OF HEADER -->

	<header class="sticky-top d-flex text-white bg-success">
		<div class="container">
			<div class="p-3 d-flex justify-content-between align-items-center">
				<a href="./index.php" id="logo" class="text-inherit mt-2">
					<h4 class="">
						<i class="bi bi-house-door-fill"></i>
						<span>C</span>ampus<span>-C</span>onnect
					</h4>
				</a>

				<button id="open-nav" type="button" class="d-lg-none btn btn-light rounded-circle shadow">
					<i class="bi bi-list fs-5"></i>
				</button>
				<nav class="d-none d-lg-flex align-items-center">
					<a href="./index.php" class="active">Home</a>
					<a href="./accomodation.php">Browse Accomodation</a>
					<a href="./about.php">About</a>
					<a href="./login_form.php">Login</a>

				</nav>
			</div>
		</div>
	</header>
	<!--END OF HEADER -->

	<!--START OF HERO SECTION -->
	<main class="position-relative">
		<div id="desktop-hero" class="d-none d-lg-block bg-success py-5">
			<div class="row justify-content-center py-5 align-items-center">
				<div class="col-auto me-5">
					<div class="text-center text-white">
						<h1 class="opener mb-5">Looking for Off-Campus accommodation?</h1>
						<p class="mx-auto lead" style="max-width: 30rem">
							We got you! Browse and filter
							<span class="text-warning fw-bolder">50+</span> Boarding houses and
							apartments available exclusively to students in Chinhoyi
						</p>
						<div class="text-center">
							<a href="./accomodation.php" class="btn btn-outline-light btn-lg rounded-pill mt-3 border-2">
								Browse Accomodation<i class="bi bi-arrow-right ms-2"></i>
							</a>
						</div>
					</div>
				</div>


			</div>
		</div>
		<!--END OF HERO SECTION -->

		<!--MOBILE NAVIGATION -->

		<div id="mobile-hero" class="d-lg-none">
			<div id="Hero" style="padding-bottom: 8rem" class="bg-success text-white">
				<div class="text-center pt-5">
					<h1 class="opener pt-5 mb-5">Looking for of campus accommodation?</h1>
					<p class="mx-auto px-3" style="max-width: 20rem">
						We got you! Browse and filter
						<span class="text-warning fw-bolder">50+</span> Boarding houses and
						apartments available exclusively to students in Chinhoyi 
					</p>
				</div>
			</div>
		</div>
		<!-- END OF MOBILE NAVIGATION -->

		<!--START OF LANDLORD LISTING-->
		<div id="features" class="container">
			<div class="row align-items-center justify-content-center my-lg-5">
				<div class="col-lg-5">
					<div class="shadow-lg p-5 text-center c-rounded-2">
						<h2 class="mb-3">Are you a landlord?</h2>
						<p class="mx-auto" style="max-width: 20rem">
							Create an account and advertise student accomodation,
							for a small listing fee per annum<br />
							<a class="btn btn-success rounded-pill mt-4" href="inner_page.php">Get Started</a>
						</p>
					</div>
				</div>
				<!--END OF LANDLORD LISTING-->


				<div class="col-lg-5">
					<img src="./assets/img/canva/canva (9).svg" class="w-100" />
				</div>
			</div>

			<div class="row align-items-center justify-content-center my-lg-5">
				<div class="col-lg-5 order-last order-lg-first">
					<img src="./assets/img/canva/canva (9).svg" class="w-100" />
				</div>

				<div class="col-lg-5 order-first order-lg-last">
					<div class="shadow-lg p-5 text-center c-rounded-2">
						<h2 class="mb-3">By the students. For the students.</h2>
						<p class="mx-auto" style="max-width: 20rem">
							Read more about why this site was created.

							<br />
							<a class="btn btn-success rounded-pill mt-4" href="./about.php">About</a>
						</p>
					</div>
				</div>
			</div>
			<!--END OF LANDLORD LISTING-->

			
		</div>


		<!--START OF FOOTER-->
		<div id="CTA" class="p-4 bg-success text-center text-white">
			<h2 class="mb-4">You've made it this far </h2>
			<a href="./register_form.php" class="btn btn-outline-light border-2 btn-lg d-none d-lg-inline-block rounded-pill">Create Account</a>
			<a href="./register_form.php" class="btn btn-outline-light border-2 d-lg-none rounded-pill">Create Account</a>
		</div>
	</main>

	<footer class="p-4 bg-success text-center text-white">
		<small>&copy;All Rights Reserved. Campus-Connect </small>
	</footer>

	<!--END OF FOOTER-->
</body>

</html>