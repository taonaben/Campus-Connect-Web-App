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
	<link href="assets/css/profile.css" rel="stylesheet" />

	<script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script defer src="assets/js/main.js"></script>
</head>

<body>
	<!--START OF HEADER -->
	<?php include './headers/customer_header.php' ?>
	<!--END OF HEADER -->

	<!-- Main -->
	<div class="main">
		<h2>IDENTITY</h2>
		<div class="card">
			<div class="card-body">
				<i class="fa fa-pen fa-xs edit" onclick="toggleEditForm('identityForm')"></i>
				<table>
					<tbody>
						<tr>
							<td>Name</td>
							<td>:</td>
							<td id="name">John Doe</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td id="email">johndoe@example.com</td>
						</tr>
						<tr>
							<td>Phone number</td>
							<td>:</td>
							<td id="phone">123-456-7890</td>
						</tr>
					</tbody>
				</table>
				<form id="identityForm" action="update_profile.php" method="post" style="display:none;">
					<input type="text" name="name" placeholder="Name" required>
					<input type="email" name="email" placeholder="Email" required>
					<input type="text" name="phone" placeholder="Phone number" required>
					<button type="submit">Save</button>
				</form>
			</div>
		</div>

		<h2>CHANGE PASSWORD</h2>
		<div class="card">
			<div class="card-body">
				<form action="change_password.php" method="post">


					<input name="current_password" type="password" id="location" class="form-control" placeholder="Current Password" />
					<input name="new_password" type="password" id="location" class="form-control" placeholder="New Password" />
					<input name="confirm_password" type="password" id="location" class="form-control" placeholder="Confirm new Password" />
					<button type="submit">Change Password</button>
				</form>
			</div>
		</div>

		<h2>SOCIAL MEDIA</h2>
		<div class="card">
			<div class="card-body">
				<i class="fa fa-pen fa-xs edit" onclick="toggleEditForm('socialMediaForm')"></i>
				<div class="social-media">
					<span class="fa-stack fa-sm">
						<i class="fas fa-circle fa-stack-2x"></i>
						<i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
					</span>
					<span class="fa-stack fa-sm">
						<i class="fas fa-circle fa-stack-2x"></i>
						<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
					</span>
					<span class="fa-stack fa-sm">
						<i class="fas fa-circle fa-stack-2x"></i>
						<i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
					</span>
					<span class="fa-stack fa-sm">
						<i class="fas fa-circle fa-stack-2x"></i>
						<i class="fab fa-invision fa-stack-1x fa-inverse"></i>
					</span>
					<span class="fa-stack fa-sm">
						<i class="fas fa-circle fa-stack-2x"></i>
						<i class="fab fa-github fa-stack-1x fa-inverse"></i>
					</span>
					<span class="fa-stack fa-sm">
						<i class="fas fa-circle fa-stack-2x"></i>
						<i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
					</span>
					<span class="fa-stack fa-sm">
						<i class="fas fa-circle fa-stack-2x"></i>
						<i class="fab fa-snapchat fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<form id="socialMediaForm" action="update_social_media.php" method="post" style="display:none;">
					<input type="text" name="facebook" placeholder="Facebook URL">
					<input type="text" name="twitter" placeholder="Twitter URL">
					<input type="text" name="instagram" placeholder="Instagram URL">
					<input type="text" name="invision" placeholder="Invision URL">
					<input type="text" name="github" placeholder="Github URL">
					<input type="text" name="whatsapp" placeholder="WhatsApp Number">
					<input type="text" name="snapchat" placeholder="Snapchat URL">
					<button type="submit">Save</button>
				</form>
			</div>
		</div>
	</div>
	<!-- End -->

	<script>
		function toggleEditForm(formId) {
			const form = document.getElementById(formId);
			if (form.style.display === "none") {
				form.style.display = "block";
			} else {
				form.style.display = "none";
			}
		}
	</script>
</body>

</html>