<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    $_SESSION['name'] = mysqli_real_escape_string($conn, $_POST['name']);
    $_SESSION['email'] = mysqli_real_escape_string($conn, $_POST['email']);
    $_SESSION['phone_number'] = $_POST['phone_number'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirm_password'] = $_POST['cpassword'];
    $_SESSION['user_type'] = $_POST['user_type'];

    // Redirect to payment page
    header('Location: ecocash_payment.php');
    exit;
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
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet" />

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="assets/css/styles2.css" rel="stylesheet" />

    <script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/main.js"></script>

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>register now</h3>

            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="phone number" name="phone_number" required placeholder="enter your phone number 078...">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <select name="user_type" class="form-select">
                <option value="user">Student-View houses</option>
                <option value="admin">Landlord-Post your house</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="login_form.php">login now</a></p>
        </form>

    </div>

</body>


</html>