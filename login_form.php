<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    // Check user credentials
    $select_query = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($conn, $select_query);
    
    if (mysqli_num_rows($result) > 0) {
        // User exists, fetch user details
        $row = mysqli_fetch_array($result);

        // Store user information in session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_type'] = $row['user_type'];

        // Redirect based on user_type
        if ($row['user_type'] == 'landlord') {
            header('Location: inner_page.php');
            exit;
        } elseif ($row['user_type'] == 'user') {
            header('Location: student_page.php');
            exit;
        }
    } else {
        // Incorrect email or password
        $error = 'Incorrect email or password!';
    }
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

    <div class="form-container">

   <form action ="" method ="post">
      <h3>login now</h3>
      

      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

   
    </body>
</html>