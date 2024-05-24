<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />

		<title>Campus-Connect</title>

<<<<<<< Updated upstream
		<!-- <link
			href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
			rel="stylesheet"
		/> -->
=======
	<title>Post house</title>

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

	<!--START OF HEADER -->
	<?php include './headers/landlord_header.php' ?>
	<!--END OF HEADER -->

	<main class="my-4 px-4" method="POST">
		<h1 class="text-center mb-3">Post your Boarding House.</h1>

		<form class="container" method="POST" enctype="multipart/form-data"
			action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div class="row">
				<div class="col-lg-6">
					<p class="text-success my-4">
						<i class="bi bi-info-circle"></i>
						Step 1. Enter the following details.
					</p>

					<!-- <div class="form-floating mb-3">
						<input name="address" type="text" id="housename" class="form-control" placeholder="Name of house" />
						<label for="housename">Address</label>
					</div> -->

					<div class="form-floating mb-3">
						<input name="location" type="text" id="location" class="form-control" placeholder="Location" />
						<label for="location">Location</label>
					</div>

					<div class="form-floating mb-3">
						<input name="price" type="number" id="price" class="form-control" placeholder="Price In USD" />
						<label for="price">Price per month In USD</label>
					</div>

					<div class="mb-3">
						<label for="house_type" class="form-label">House Type</label>
						<select name="house_type" id="house_type" class="form-select">
							<option value="boys">Boys only</option>
							<option value="girls">Girls only</option>
							<option value="mixed">Mixed</option>
						</select>
					</div>

					<div class="bg-light c-rounded-1 p-3 mb-3">
						<h5>Room types</h5>

						<div class="form-check">
							<input class="form-check-input" name="single" type="checkbox" />
							<label class="form-check-label">Singles</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" name="double" type="checkbox" />
							<label class="form-check-label">Doubles</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" name="3_sharing" type="checkbox" />
							<label class="form-check-label">3 Sharings</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" name="other" type="checkbox" />
							<label class="form-check-label">Other</label>
						</div>

					</div>
>>>>>>> Stashed changes




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

	<body>
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
				<a href="./index.php">SignIn</a>
			</div>

			<a href="#" class="back-to-top d-flex align-items-center justify-content-center"
				><i class="bi bi-arrow-up-short"></i
			></a>
		</div>

<<<<<<< Updated upstream
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
						<a href="./index.php" class="active">Home</a>
						<a href="./accomodation.php">Browse</a>
						<a href="./logout.php">Logout</a>
						
					</nav>
=======
					<div class="container-fluid p-0">
						<div class="row justify-content-around images-container m-0 p-0">
							<div class="col-12 border h-120-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)"
									class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image1" class="d-none"
									accept="image/jpeg, image/png, image/gif" onchange="previewImage(this, 'image1_preview')"/>
									<!-- <img id="image1_preview" class="img-preview d-none" /> -->
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)"
									class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image2" class="d-none"
									accept="image/jpeg, image/png, image/gif" onchange="previewImage(this, 'image2_preview')"/>
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)"
									class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image3" class="d-none"
									accept="image/jpeg, image/png, image/gif" onchange="previewImage(this, 'image3_preview')"/>
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)"
									class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image4" class="d-none"
									accept="image/jpeg, image/png, image/gif" onchange="previewImage(this, 'image4_preview')"/>
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)"
									class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image5" class="d-none"
									accept="image/jpeg, image/png, image/gif" onchange="previewImage(this, 'image5_preview')"/>
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)"
									class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image6" class="d-none"
									accept="image/jpeg, image/png, image/gif" onchange="previewImage(this, 'image6_preview')"/>
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)"
									class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image7" class="d-none"
									accept="image/jpeg, image/png, image/gif" onchange="previewImage(this, 'image7_preview')"/>
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="otherdetails" class="form-label d-block p-2">Additional Information</label>
						<textarea class="form-control" name="add_info" id="otherdetails" rows="4" placeholder="
Boarding House details, condition, rules and any other information."></textarea>
					</div>

					<div class="bg-light c-rounded-1 p-3 mb-3">
						<h5>Walking Distance to Campus</h5>

						<div class="d-flex">
							<input class="walking-distance" value="2" max="20" min="0" step="1" type="range"
								name="distance" />
							<label id="walking-distance-label" class="ms-2 text-nowrap">5 km</label>
						</div>
						<input type="hidden" name="distance" />
					</div>


					<div>

						<input type="submit" name="submit" value="submit" class="btn me-2 my-3 btn-primary">
						<button class="btn btn-danger" type="reset">
							Reset
						</button>
					</div>
>>>>>>> Stashed changes
				</div>
			</div>
		</header>
		<!--END OF HEADER -->





        <main class="my-4 px-4">
			<h1 class="text-center mb-3">Post your Boarding House.</h1>

			<form class="container">
				<div class="row">
					<div class="col-lg-6">
						<p class="text-success my-4">
							<i class="bi bi-info-circle"></i>
							Step 1. Enter the following details.
						</p>

						<div class="form-floating mb-3">
							<input
								name="housename"
								type="text"
								id="housename"
								class="form-control"
								placeholder="Name of house"
							/>
							<label for="vehiclename">Name of Boarding House</label>
						</div>

						<div class="form-floating mb-3">
							<input
								name="vehicleprice"
								type="number"
								id="vehicleprice"
								class="form-control"
								placeholder="Price In USD"
							/>
							<label for="vehicleprice">Price In USD</label>
						</div>

						<div class="form-floating mb-3">
							<input
								name="AccommodationType"
								type="text"
								id="AccommodationType"
								class="form-control"
								placeholder="AccommodationType"
							/>
							<label for="vehiclelocation">Accommodation Type</label>
						</div>

						
						<div class="form-floating mb-3">
							<input
								name="vehiclelocation"
								type="text"
								id="vehiclelocation"
								class="form-control"
								placeholder="Location"
							/>
							<label for="vehiclelocation">Location</label>
						</div>

						<div class="mb-3">
							<label
								for="descriptionText"
								class="form-label d-block p-2"
								>Description</label
							>
							<textarea
								class="form-control"
								name="otherdetails"
								id="otherdetails"
								rows="4"
							>
Boarding House details, condition, features and any other information.</textarea
							>
						</div>
					</div>

					<div class="col-lg-6">
						<p class="text-success my-4">
							<i class="bi bi-info-circle"></i>
							Step 2. Upload images. Image 1 will be displayed
							first.
						</p>

						<div class="container-fluid p-0">
							<div
								class="row justify-content-around images-container m-0 p-0"
							>
								<div
									class="col-12 border h-120-px position-relative bg-dark mb-1"
								>
									<i
										onclick="clickNext(this)"
										class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"
									></i>
									<input
										type="file"
										name="image1"
										class="d-none"
									/>
								</div>

								<div
									class="col-4 border h-80-px position-relative bg-dark mb-1"
								>
									<i
										onclick="clickNext(this)"
										class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"
									></i>
									<input
										type="file"
										name="image2"
										class="d-none"
									/>
								</div>

								<div
									class="col-4 border h-80-px position-relative bg-dark mb-1"
								>
									<i
										onclick="clickNext(this)"
										class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"
									></i>
									<input
										type="file"
										name="image3"
										class="d-none"
									/>
								</div>

								<div
									class="col-4 border h-80-px position-relative bg-dark mb-1"
								>
									<i
										onclick="clickNext(this)"
										class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"
									></i>
									<input
										type="file"
										name="image4"
										class="d-none"
									/>
								</div>

								<div
									class="col-4 border h-80-px position-relative bg-dark mb-1"
								>
									<i
										onclick="clickNext(this)"
										class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"
									></i>
									<input
										type="file"
										name="image5"
										class="d-none"
									/>
								</div>

								<div
									class="col-4 border h-80-px position-relative bg-dark mb-1"
								>
									<i
										onclick="clickNext(this)"
										class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"
									></i>
									<input
										type="file"
										name="image6"
										class="d-none"
									/>
								</div>

								<div
									class="col-4 border h-80-px position-relative bg-dark mb-1"
								>
									<i
										onclick="clickNext(this)"
										class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"
									></i>
									<input
										type="file"
										name="image7"
										class="d-none"
									/>
								</div>
							</div>
						</div>


						<div>
							<button
								class="btn me-2 my-3 btn-primary"
								type="submit"
							>
								Proceed
							</button>

							<button class="btn btn-danger" type="reset">
								Reset
							</button>
						</div>
					</div>
				</div>
			</form>
		</main>




        <!-- 
            THIS 
            IS
            THE
            BODY                                               WRITE YOUR CODE HERE!
            OF 
            THE
            WEBSITE 
        -->



         





<!--START OF FOOTER--> 
			
		</main>

		<footer class="p-4 bg-success text-center text-white">
			<small>&copy;All Rights Reserved. Campus-Connect </small>
		</footer>

<!--END OF FOOTER--> 




<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/main2.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
		function previewImage(input, previewId) {
			const preview = document.getElementById(previewId);
			const file = input.files[0];

			if (file) {
				const reader = new FileReader();

				reader.onload = function (e) {
					preview.src = e.target.result;
					preview.classList.remove('d-none'); // Show the preview image
				}

				reader.readAsDataURL(file); // Read the file as a data URL
			} else {
				preview.src = ''; // Clear the preview if no file is selected
				preview.classList.add('d-none'); // Hide the preview image
			}
		}
	</script>

	</body>
</html>
