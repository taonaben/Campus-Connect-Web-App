<?php
// Define the number of cards per page
$cardsPerPage = 5;

// Connect to the database (assuming you have a $conn variable already established)
include 'config.php';

// Retrieve user inputs from the form
// $distance = isset($_GET['distance']) ? intval($_GET['distance']) : 20;
$cost = isset($_GET['cost']) ? $_GET['cost'] : '';
$room_types = isset($_GET['room_type']) ? $_GET['room_type'] : [];
$features = isset($_GET['features']) ? $_GET['features'] : [];  // Filter for features

// Construct the SQL query with filters
$sql_filters = [];

// Filter for cost
if (!empty($cost)) {
	if ($cost === '100+') {
		$sql_filters[] = "price > 100";
	} else {
		list($min, $max) = explode('-', $cost);
		$sql_filters[] = "price BETWEEN $min AND $max";
	}
}

// Filter for room types
if (!empty($room_types)) {
	$room_type_conditions = [];
	foreach ($room_types as $room_type) {
		$room_type_conditions[] = "$room_type = 1";
	}
	if (!empty($room_type_conditions)) {
		$sql_filters[] = '(' . implode(' OR ', $room_type_conditions) . ')';
	}
}

// filter for features
if (!empty($features)) {
	$feature_conditions = [];
	foreach ($features as $feature) {
		// Assuming the feature names are stored in columns with the same name in the database
		$feature_conditions[] = "$feature = 1";
	}
	if (!empty($feature_conditions)) {
		$sql_filters[] = '(' . implode(' OR ', $feature_conditions) . ')';
	}
}


$filter_query = !empty($sql_filters) ? "WHERE " . implode(" AND ", $sql_filters) : "";

// Query to count total number of properties
$sql = "SELECT COUNT(*) AS total FROM properties $filter_query";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalProperties = $row['total']; // Total number of properties

// Calculate the total number of pages
$totalPages = ceil($totalProperties / $cardsPerPage);

// Retrieve the current page number from the URL parameter
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for pagination
$offset = ($current_page - 1) * $cardsPerPage;

// Query to fetch data from the 'properties' table with pagination and filters
$sql = "SELECT * FROM properties $filter_query LIMIT $offset, $cardsPerPage";
$result = mysqli_query($conn, $sql);
?>

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

<body class="bg-success">
	<div class="invisible-items">
		<div id="preloader"></div>

		<div id="mobile-nav">
			<button id="close-nav" class="btn">
				<i class="bi bi-x fs-1 m-2"></i>
			</button>
			<a href="./index.php">Home</a>
			<a href="./accomodation.php" class="text-decoration-underline">Browse Accomodation</a>
			<a href="./about.php">About</a>
			<a href="./contact.php">Get In Touch</a>
		</div>

		<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	</div>

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
					<!--<a href="./index.php">Home</a> -->
					<a href="./accomodation.php" class="active">Accomodation</a>
					<a href="./about.php">About</a>
					<a href="./contact.php">Get In Touch</a>
					<a href="./logout.php">Logout</a>


				</nav>
			</div>
		</div>
	</header>

	<main class="container py-4 px-2">
		<div class="row">
			<div id="sidebar" class="col-3 d-none d-lg-block">
				<form method="GET" action="accomodation.php">
					<div class="c-rounded-2 p-4 bg-white" style="min-height: 75vh">
						<h2 class="px-3">Preferences</h2>

						<!-- <div class="bg-light c-rounded-1 p-3 mb-3">
							<h5>Walking Distance</h5>
							<div class="d-flex">
								<input class="walking-distance" name="distance" value="2" max="20" min="0" step="1" type="range" />
								<label id="walking-distance-label" class="ms-2 text-nowrap">5 km</label>
							</div>
						</div> -->

						<div class="bg-light c-rounded-1 p-3 mb-3">
							<h5>Rent (monthly)</h5>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="cost" value="50-80" />
								<label class="form-check-label"> $ 0-50 </label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="cost" value="80-100" />
								<label class="form-check-label"> $ 50-100 </label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="cost" value="100+" />
								<label class="form-check-label"> $ 100+ </label>
							</div>
						</div>

						<div class="bg-light c-rounded-1 p-3 mb-3">
							<h5>Room type</h5>
							<div class="form-check">
								<input class="form-check-input" name="room_type[]" type="checkbox" value="single" />
								<label class="form-check-label">Singles</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" name="room_type[]" type="checkbox" value="double_room" />
								<label class="form-check-label">Doubles</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" name="room_type[]" type="checkbox" value="3_sharing" />
								<label class="form-check-label">3 Sharings</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" name="room_type[]" type="checkbox" value="other" />
								<label class="form-check-label">Other</label>
							</div>
						</div>
						<div class="bg-light c-rounded-1 p-3 mb-3">
							<h5>Features</h5>

							<div class="form-check">
								<input class="form-check-input" name="features[]" type="checkbox" value="water_tank" />
								<label class="form-check-label">water_tank</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" name="features[]" type="checkbox" value="wifi" />
								<label class="form-check-label">Wi-Fi</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" name="features[]" type="checkbox" value="solar_backup" />
								<label class="form-check-label">Solar Backup</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" name="features[]" type="checkbox" value="security" />
								<label class="form-check-label">Security</label>
							</div>

							<div class="form-check">
								<input class="form-check-input" name="features[]" type="checkbox" value="caretaker" />
								<label class="form-check-label">Caretaker</label>
							</div>
						</div>


						<button type="submit" class="btn btn-success">Apply Filters</button>
					</div>
				</form>
			</div>

			<div id="content" class="col">
				<div class="bg-white shadow-lg c-rounded-2 p-4 p-lg-5">

					<div id="Listings" class="my-5">
						<h3 class="text-center mb-4">All Accomodation</h3>

						<?php	// Check if there are any rows returned
						if (mysqli_num_rows($result) > 0) {
							// Loop through each row of data
							while ($row = mysqli_fetch_assoc($result)) {
								// Output the data in the desired format (dynamic cards)
						?>


								<!-- Begin Property Listing -->
								<div class="property-listing" id="listing-<?php echo $listingCount; ?>">
									<!-- Your HTML code for the property listing goes here -->


									<div class="mb-5 border bg-light c-rounded-2 p-lg-4 overflow-hidden">
										<div class="d-lg-flex align-items-center">
											<div class="col-lg-6 c-rounded-lg-1 overflow-hidden d-flex p-0">
												<div class="w-50">
													<?php
													// Output the first image as the main image
													$mainImage = $row['img1']; // Assuming the column name for image is 'img1'
													if (!empty($mainImage)) {
														echo '<img src="data:image/jpeg;base64,' . base64_encode($mainImage) . '" class="h-100 w-100 object-fit-cover border-end border-light" />';
													}
													?>
												</div>

												<div class="w-50 d-flex flex-wrap">
													<?php
													// Output additional images
													for ($i = 2; $i <= 5; $i++) {
														$imageField = 'img' . $i;
														$additionalImage = $row[$imageField]; // Assuming the column names for additional images are 'img2', 'img3', 'img4', 'img5'
														if (!empty($additionalImage)) {
													?>
															<div class="col-6 p-0">
																<img src="data:image/jpeg;base64,<?php echo base64_encode($additionalImage); ?>" class="h-100 w-100 border-end border-bottom border-light object-fit-cover" />
															</div>
													<?php
														}
													}
													?>
												</div>
											</div>
											<div class="col-lg-6 p-3 p-lg-0 ps-lg-4">
												<div class="d-flex d-lg-block align-items-start align-items-lg-stretch justify-content-between">
													<div class="mb-lg-3">
														<!-- make to remove address from cards -->
														<h4 class="mb-3 text-nowrap w-100 text-ellipsis overflow-hidden">
															<?php echo $row['address']; ?>
														</h4>
														<div class="mb-3">
															<i class="bi bi-geo-alt"></i> <?php echo $row['location']; ?>
														</div>
														<div class="mb-3">
															<i class="bi bi-geo"></i> <?php echo $row['distance']; ?> km from Campus
														</div>
														<div>
															<i class="bi bi-currency-dollar"></i> <?php echo $row['price']; ?>/month
														</div>
													</div>


													<div class="d-flex align-items-center justify-content-between">
														<a href="./view_listing.php?house_id=<?php echo $row['house_id']; ?>" class="btn btn-success btn-sm rounded-pill px-3">View</a>

													</div>
												</div>
											</div>
										</div>


										<!-- Other property details -->
									</div>
									<!-- End Property Listing -->





								<?php
							} ?>

								<!-- Page Selector -->
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center">
										<li class="page-item <?php echo ($current_page == 1) ? 'disabled' : ''; ?>">
											<a class="page-link border-0" href="?page=1"><i class="bi bi-chevron-double-left"></i></a>
										</li>
										<?php for ($page = 1; $page <= $totalPages; $page++) : ?>
											<li class="page-item <?php echo ($page == $current_page) ? 'active' : ''; ?>">
												<a class="page-link bg-light text-success border-0" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
											</li>
										<?php endfor; ?>
										<li class="page-item <?php echo ($current_page == $totalPages) ? 'disabled' : ''; ?>">
											<a class="page-link border-0" href="?page=<?php echo $totalPages; ?>"><i class="bi bi-chevron-double-right"></i></a>
										</li>
									</ul>
								</nav>

							<?php
						} else {
							// If no rows are returned, display a message
							echo "No properties found.";
						}

						// Close the database connection
						mysqli_close($conn);
							?>
								</div>
					</div>
				</div>
	</main>

	<footer class="p-4 bg-success text-center text-white">
		<small>&copy;All Rights Reserved. Campus-Connect </small>
	</footer>
</body>

</html>