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
		<link
			href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap"
			rel="stylesheet"
		/>

		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

		<link href="assets/css/style.css" rel="stylesheet" />

		<script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script defer src="assets/js/main.js"></script>
	</head>

	<body
	>
		
	<div class="invisible-items">
		<div id="preloader"></div>

		<div id="mobile-nav">
			<button id="close-nav" class="btn">
				<i class="bi bi-x fs-1 m-2"></i>
			</button>
			<a href="./index.html" class="text-decoration-underline">Home</a>
			<a href="./accomodation.html">Browse Accomodation</a>
			<a href="./about.html">About</a>
			<a href="./contact.html">Get In Touch</a>
		</div>

		<a href="#" class="back-to-top d-flex align-items-center justify-content-center"
			><i class="bi bi-arrow-up-short"></i
		></a>
	</div>

	<!--START OF HEADER -->

	<header class="sticky-top d-flex text-white bg-success">
		<div class="container">
			<div class="p-3 d-flex justify-content-between align-items-center">
				<a href="./index.html" id="logo" class="text-inherit mt-2">
					<h4 class="">
						<i class="bi bi-house-door-fill"></i>
						<span>C</span>ampus<span>-C</span>onnect
					</h4>
				</a>

				<button
					id="open-nav"
					type="button"
					class="d-lg-none btn btn-light rounded-circle shadow"
				>
					<i class="bi bi-list fs-5"></i>
				</button>
				<nav class="d-none d-lg-flex align-items-center">
					<a href="./index.html" class="active">Home</a>
					
					<a href="./login.html">Login</a>
				</nav>
			</div>
		</div>
	</header>
	<!--END OF HEADER -->



	<main class="p-5">
		<h1 class="display-1 text-center">
			<i class="bi bi-person-circle"></i>
		</h1>

		<h1 class="text-center mb-5">Sign Up</h1>

		<form class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="form-floating mb-3">
						<input
							name="username"
							type="text"
							id="username"
							class="form-control"
							placeholder="Username"
						/>
						<label for="username">Username</label>
					</div>

					<div class="form-floating mb-3">
						<input
							name="email"
							type="email"
							id="email"
							class="form-control"
							placeholder="Email Address"
						/>
						<label for="floatingInput">Email address</label>
					</div>

					<div class="form-floating mb-3">
						<input
							name="password1"
							type="password"
							class="form-control"
							id="password1"
							placeholder="Password"
						/>
						<label for="password1">Password</label>
					</div>

					<div class="form-floating mb-3">
						<input
							name="password2"
							type="password"
							class="form-control"
							id="password2"
							placeholder="Confirm Password"
						/>
						<label for="password2">Confirm Password</label>
					</div>

				
				</div>

				<div class="col-md-6">
					<div class="mb-3 px-2">
						<div class="form-check">
							<input
								class="form-check-input"
								type="radio"
								checked
								name="user-type"
								value="NU"
								id="normaluser"
							/>
							<label
								class="form-check-label"
								for="normaluser"
							>
								Student Account
							</label>
						</div>

						<div class="form-check">
							<input
								class="form-check-input"
								type="radio"
								name="user-type"
								value="DA"
								id="dealershipaccount"
							/>
							<label
								class="form-check-label"
								for="dealershipaccount"
							>
								Landlord Account(Listing fee included)
							</label>
						</div>
					</div>

					
					<div>
						<button class="btn m-2 btn-primary" type="submit">
							Proceed
						</button>

						<button class="btn btn-danger" type="reset">
							Reset
						</button>
					</div>

					<p class="m-2">
						Already have an account?
						<a class="normal-link" href="login.html">Login</a>
					</p>
				</div>
			</div>
		</form>
	</main>



	</body>
</html>
