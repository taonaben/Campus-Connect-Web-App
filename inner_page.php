<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
	header("Location: login_form.php");
	exit;
}

if (isset($_POST['submit'])) {
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Capture strings
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$add_info = mysqli_real_escape_string($conn, $_POST['add_info']);
	$admin_id = $_SESSION['user_id'];  // Get the admin ID from the session

	// Initialize the variable to store the checkbox value
	$waterTank = isset($_POST['water_tank']) ? 1 : 0;
	$wifi = isset($_POST['wifi']) ? 1 : 0;
	$solar = isset($_POST['solar']) ? 1 : 0;
	$security = isset($_POST['security']) ? 1 : 0;
	$caretaker = isset($_POST['caretaker']) ? 1 : 0;
	$single = isset($_POST['single']) ? 1 : 0;
	$double = isset($_POST['double']) ? 1 : 0;
	$sharing3 = isset($_POST['3_sharing']) ? 1 : 0;
	$other = isset($_POST['other']) ? 1 : 0;

	// Retrieve walking distance value
	$walkingDistance = mysqli_real_escape_string($conn, $_POST['distance']);

	// Handle file upload
	try {
		// Initialize an array to store image data
		$imageData = [];

		// Loop through uploaded files
		for ($i = 1; $i <= 7; $i++) {
			if (isset($_FILES["image$i"]) && $_FILES["image$i"]['error'] === UPLOAD_ERR_OK) {
				// Get image data and add it to the array
				$imageData[] = mysqli_real_escape_string($conn, file_get_contents($_FILES["image$i"]['tmp_name']));
			}
			else{
				$imageData[] = null;
			}
		}

		// Prepare placeholders for SQL query
		$placeholders = implode(', ', array_fill(0, count($imageData), '?'));

		// SQL query to insert image data and other fields into the database
		$sql = "INSERT INTO properties (
            admin_id,
            address,
            price,
            location,
            img1,
            img2,
            img3,
            img4,
            img5,
            img6,
            img7,
            water_tank,
            wifi,
            security,
            caretaker,
            solar_backup,
            single,
            double_room,
            3_sharing,
            other,
            distance,
            add_info
        ) VALUES (
            '$admin_id',
            '$address',
            '$price',
            '$location',
            $placeholders,
            '$waterTank',
            '$wifi',
            '$security',
            '$caretaker',
            '$solar',
            '$single',
            '$double',
            '$sharing3',
            '$other',
            '$walkingDistance',
            '$add_info'
        )";

		// Prepare and bind parameters for image data
		$stmt = $conn->prepare($sql);
		if ($stmt) {
			$stmt->bind_param(str_repeat('s', count($imageData)), ...$imageData);

			// Execute the query
			if ($stmt->execute()) {
				echo "Property added successfully.";
				header('Location: index.php');
				exit;
			} else {
				echo "Error uploading property: " . $stmt->error;
			}

			$stmt->close();
		} else {
			echo "Error preparing statement: " . $conn->error;
		}
	} catch (Exception $e) {
		echo "Error uploading images: " . $e->getMessage();
	}

	// Close connection
	mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<title>Campus-Connect</title>

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
			<a href="./index.html" class="text-decoration-underline">Home</a>
			<a href="./accomodation.html">Browse Accomodation</a>
			<a href="./about.html">About</a>
			<a href="./contact.html">Get In Touch</a>
			<a href="./index.php">SignIn</a>
		</div>

		<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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

				<button id="open-nav" type="button" class="d-lg-none btn btn-light rounded-circle shadow">
					<i class="bi bi-list fs-5"></i>
				</button>
				<nav class="d-none d-lg-flex align-items-center">
					<a href="./index.php" class="active">Home</a>
					<a href="./accomodation.php">Browse</a>
					<a href="./logout.php">Logout</a>

				</nav>
			</div>
		</div>
	</header>
	<!--END OF HEADER -->

	<main class="my-4 px-4" method="POST">
		<h1 class="text-center mb-3">Post your Boarding House.</h1>

		<form class="container" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div class="row">
				<div class="col-lg-6">
					<p class="text-success my-4">
						<i class="bi bi-info-circle"></i>
						Step 1. Enter the following details.
					</p>

					<div class="form-floating mb-3">
						<input name="address" type="text" id="housename" class="form-control" placeholder="Name of house" />
						<label for="housename">Address</label>
					</div>

					<div class="form-floating mb-3">
						<input name="price" type="number" id="price" class="form-control" placeholder="Price In USD" />
						<label for="price">Price/pm In USD</label>
					</div>

					<div class="form-floating mb-3">
						<input name="location" type="text" id="location" class="form-control" placeholder="Location" />
						<label for="location">Location</label>
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



					<div class="bg-light c-rounded-1 p-3 mb-3">
						<h5>Features</h5>

						<div class="form-check">
							<input class="form-check-input" name="water_tank" type="checkbox" />
							<label class="form-check-label">Water Tank</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" name="wifi" type="checkbox" />
							<label class="form-check-label">Wi-Fi</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" name="solar" type="checkbox" />
							<label class="form-check-label">Solar Backup</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" name="security" type="checkbox" />
							<label class="form-check-label">Security</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" name="caretaker" type="checkbox" />
							<label class="form-check-label">Caretaker</label>
						</div>
					</div>

				</div>

				<div class="col-lg-6">
					<p class="text-success my-4">
						<i class="bi bi-info-circle"></i>
						Step 2. Upload images. Image 1 will be displayed
						first.
					</p>

					<div class="container-fluid p-0">
						<div class="row justify-content-around images-container m-0 p-0">
							<div class="col-12 border h-120-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)" class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image1" class="d-none" accept="image/jpeg, image/png, image/gif" />
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)" class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image2" class="d-none" accept="image/jpeg, image/png, image/gif" />
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)" class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image3" class="d-none" accept="image/jpeg, image/png, image/gif" />
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)" class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image4" class="d-none" accept="image/jpeg, image/png, image/gif" />
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)" class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image5" class="d-none" accept="image/jpeg, image/png, image/gif" />
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)" class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image6" class="d-none" accept="image/jpeg, image/png, image/gif" />
							</div>

							<div class="col-4 border h-80-px position-relative bg-dark mb-1">
								<i onclick="clickNext(this)" class="bi bi-image position-absolute top-50 start-50 translate-middle fs-1 hover-white"></i>
								<input type="file" name="image7" class="d-none" accept="image/jpeg, image/png, image/gif" />
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="otherdetails" class="form-label d-block p-2">Additional Information</label>
						<textarea class="form-control" name="add_info" id="otherdetails" rows="4" placeholder="
Boarding House details, condition, rules and any other information."></textarea>
					</div>

					<div class="bg-light c-rounded-1 p-3 mb-3">
						<h5>Walking Distance</h5>

						<div class="d-flex">
							<input class="walking-distance" value="2" max="20" min="0" step="1" type="range" name="distance" />
							<label id="walking-distance-label" class="ms-2 text-nowrap">5 km</label>
						</div>
						<input type="hidden" name="distance"/>
					</div>


					<div>

						<input type="submit" name="submit" value="submit" class="btn me-2 my-3 btn-primary">
						<button class="btn btn-danger" type="reset">
							Reset
						</button>
					</div>
				</div>
			</div>
		</form>


	</main>


	</main>

	<footer class="p-4 bg-success text-center text-white">
		<small>&copy;All Rights Reserved. Campus-Connect </small>
	</footer>

	<!--END OF FOOTER-->

	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/main2.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>