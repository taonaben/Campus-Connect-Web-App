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
	<link href="assets/css/contact.css" rel="stylesheet" />

	<script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script defer src="assets/js/main.js"></script>
</head>

<body>
	<!--START OF HEADER -->
	<?php include './headers/customer_header.php' ?>
	<!--END OF HEADER -->
	<section class="contact">
		<div class="layout">
			<div class="text-center">
				<h1 class="section-title">Contact Us</h1>
				<h2 style="font-style: bold;">Let's talk about everything</h2>
			</div>
			<div class="grid-8 form">
				<form action="./important/email.php" method="post" id="contact_form" name="contactForm">
					<div class="form-inline clearfix">
						<div class="form-group grid-6">
							<label for="InputName">Name</label>
							<input type="text" placeholder="enter your name" id="InputName" name="name" class="form-control" required>
						</div>
						<div class="form-group grid-6">
							<label for="InputSurname">Surname</label>
							<input type="text" placeholder="enter your surname" id="InputSurname" name="surname" class="form-control" required>
						</div>
						<div class="form-group grid-6">
							<label for="InputEmail">Email</label>
							<input type="email" placeholder="enter your email address" id="InputEmail" name="email" class="form-control" required>
						</div>
						<div class="form-group grid-6">
							<label for="InputSubject">Subject</label>
							<input type="text" placeholder="subject" id="InputSubject" name="subject" class="form-control" required>
						</div>
						<div class="form-group grid-12">
							<label for="InputMessage">Message</label>
							<textarea placeholder="message" id="InputMessage" rows="3" name="message" class="form-control" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<div style="display:none;" class="success" id="mail_success">Your message has been sent successfully.</div>
						<div style="display:none;" class="error" id="mail_fail"> Sorry, error occurred this time sending your message.</div>
					</div>
					<div id="submit" class="form-group grid-12">
						<input type="submit" value="send" class="btn btn-lg costom-btn" id="send_message">
					</div>
				</form>
			</div>
			<div class="grid-12">
				<div class="icon-text">
					<span>find us on</span>
				</div>
				<div class="icon-holder">
					<ul>
						<li><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a target="_blank" href="#"><i class="fa fa-behance"></i></a></li>
						<li><a target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</body>

</html>