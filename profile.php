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

	<!--END OF HEADER -->
	<?php
	if ($loggedIn) {
		if ($user_type === "admin") {
			include './headers/landlord_header.php';
		} else {
			include './headers/customer_header.php';
		}
	} else {
		// User not logged in, include a default header or display a generic header
		include './headers/customer_header.php';
	}
	?>

	<section class="my-5">
		<div class="container">
			<div class="main-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-column align-items-center text-center">
									<img src="data:image/png;base64,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" alt="Admin" class="rounded-circle p-1 bg-warning" width="110" height="110">
									<?php if ($loggedIn) : ?>
										<div class="mt-3">
											<h2><?php echo htmlspecialchars($userData['name']); ?></h2>
											<?php if ($user_type === "admin") : ?>
												<h4>Landlord</h4>
											<?php else : ?>
												<h4>Customer</h4>
											<?php endif; ?>
											<p class="text-secondary mb-1"><?php echo htmlspecialchars($userData['phone_number']); ?></p>
										</div>
									<?php endif; ?>
								</div>
								<div class="list-group list-group-flush text-center mt-4">
									<a href="#" class="list-group-item list-group-item-action border-0 active" onclick="showProfileDetails()">Profile Information</a>
									<a href="#" class="list-group-item list-group-item-action border-0" onclick="showChangePasswordSection()">Change Password</a>
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

						<div id="changePasswordSection" class="card" style="display: none;">
							<div class="card-body">
								<?php if ($loggedIn) : ?>
									<h5>Change Password</h5>
									<form id="changePasswordForm" method="post" action="change_password.php">
										<div class="form-group">
											<label for="currentPassword">Current Password</label>
											<input type="password" class="form-control" id="currentPassword" name="current_password" required>
										</div>
										<div class="form-group">
											<label for="newPassword">New Password</label>
											<input type="password" class="form-control" id="newPassword" name="new_password" required>
										</div>
										<div class="form-group">
											<label for="confirmNewPassword">Confirm New Password</label>
											<input type="password" class="form-control" id="confirmNewPassword" name="confirm_new_password" required>
										</div>
										<button type="submit" class="btn btn-primary">Change Password</button>
									</form>
								<?php else : ?>
									<div class="profile-info">
										<h5>Please log in to change password</h5>
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

		function showChangePasswordSection() {
			hideAllSections();
			document.getElementById('changePasswordSection').style.display = 'block';
			setActiveLink(1); // Assuming it's the second link
		}

		// Update your setActiveLink function to accommodate the new section
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