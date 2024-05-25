<?php
// Include the database configuration file
include 'config.php';

// Start the session
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['user_id']);
$userData = [];

if ($loggedIn) {
	$user_id = $_SESSION['user_id'];

	// Fetch the user data from the database
	$query = "SELECT name, email, phone_number, user_type FROM user_form WHERE id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $user_id);
	$stmt->execute();
	$stmt->bind_result($name, $email, $phone_number, $user_type);
	$stmt->fetch();
	$stmt->close();

	$userData = [
		'name' => $name,
		'email' => $email,
		'phone_number' => $phone_number,
		'user_type' => $user_type
	];
}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Profile</title>
	<link rel="stylesheet" href="assets/css/profile.css" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<style>
		.list-group-item.active {
			background: rgb(25 135 84) !important;
		}

		.bg-warning {
			background: rgb(25 135 84) !important;
		}

		.modal-content {
			background-color: #fefefe;
			margin: 4% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 70%;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			transition: transform 0.3s ease-in-out;
			/*transform: translateY(-100%);*/
		}

		.close {
			float: right;
			text-align: right;
			font-size: 30px;
		}

		.modal-content h2 {
			text-align: center;
			margin-top: -35px;
		}

		.button_div {
			justify-content: center;
			text-align: center;
		}

		.button_div button {
			margin-right: 10px;
			background: rgb(25 135 84);
			border: 1px solid rgb(25 135 84);
			padding: 5px 15px;
			color: #FFFFFF;
			border-radius: 2px;
		}

		#addAddressForm input {
			padding: 5px;
		}

		.nice-select {
			padding: 0px !important;
			height: 38px !important;
			line-height: 38px !important;
		}

		.add_address_button {
			background: rgb(25 135 84);
			border: 1px solid rgb(25 135 84);
			padding: 5px 15px;
			color: #FFFFFF;
			border-radius: 2px;
		}

		@media (max-width: 768px) {
			.main_flex_div {
				display: flex;
				flex-direction: column;
			}

			.inner_flex_div {
				min-width: 100% !important;
			}

			.modal-content {
				padding: 10px 0px !important;
				min-width: 95% !important;
				height: 700px;
				overflow: scroll;
			}

			.close {
				margin-right: 10px;
			}
		}
	</style>
</head>

<body>
	<!--START OF HEADER -->
	<?php include './headers/customer_header.php' ?>
	<!--END OF HEADER -->
	<section class="my-5">
		<div class="container">
			<div class="main-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-column align-items-center text-center">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtbEsykx-0fhTred6UwHDYtMFd2UgTJCG4gaklT1dx4suRO4_n5LJr4Gg28kquSX5fpNo&usqp=CAU" alt="Admin" class="rounded-circle p-1 bg-warning" width="110">
									<?php if ($loggedIn) : ?>
										<div class="mt-3">
											<h4><?php echo htmlspecialchars($userData['name']); ?></h4>
											<h4><?php echo htmlspecialchars($userData['user_type']); ?></h4>
											<p class="text-secondary mb-1"><?php echo htmlspecialchars($userData['phone_number']); ?></p>
										</div>
									<?php endif; ?>
								</div>
								<div class="list-group list-group-flush text-center mt-4">
									<a href="#" class="list-group-item list-group-item-action border-0 active" onclick="showProfileDetails()">Profile Information</a>
									<?php if (!$loggedIn) : ?>
										<a href="login_form.php" class="list-group-item list-group-item-action border-0">LogIn</a>
									<?php endif; ?>
									<?php if ($loggedIn) : ?>
										<a href="logout.php" class="list-group-item list-group-item-action border-0">Logout</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div id="profileDetails" class="card">
							<div class="card-body">
								<?php if ($loggedIn) : ?>
									<div class="profile-info">
										<h5>Profile Information</h5>
										<p><strong>Name:</strong> <?php echo htmlspecialchars($userData['name']); ?></p>
										<p><strong>Email Address:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
										<p><strong>Contact:</strong> <?php echo htmlspecialchars($userData['phone_number']); ?></p>
									</div>
								<?php else : ?>
									<div class="profile-info">
										<h5>Please log in to see your profile information.</h5>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<!-- Other sections can be added here similarly -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script>
		function showProfileDetails() {
			hideAllSections();
			document.getElementById('profileDetails').style.display = 'block';
			setActiveLink(0);
		}

		function hideAllSections() {
			document.getElementById('profileDetails').style.display = 'none';
			// Hide other sections if added in the future
		}

		function setActiveLink(index) {
			document.querySelectorAll('.list-group-item').forEach((item, idx) => {
				if (idx === index) {
					item.classList.add('active');
				} else {
					item.classList.remove('active');
				}
			});
		}

		// Show profile details by default
		showProfileDetails();
	</script>
</body>

</html>