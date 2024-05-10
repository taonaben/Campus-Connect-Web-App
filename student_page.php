<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

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
		<link
			href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap"
			rel="stylesheet"
		/>

		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

		<link href="assets/css/styles2.css" rel="stylesheet" />

		<script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script defer src="assets/js/main.js"></script>
	</head>
    <body>

	<div class="container">

   <div class="content">
      
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>You have successfully logged in to Campus Connect😇</p>
     
      <a href="accomodation.php" class="btn">Continue</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>
	

    </body>
</html>