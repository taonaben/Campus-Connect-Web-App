<?php
session_start();
include 'config.php';

if (!isset($_SESSION['payment_confirmed']) || $_SESSION['payment_confirmed'] !== true) {
    // If payment is not confirmed, redirect to registration page
    header('Location: register.php');
    exit;
}

// Retrieve stored session variables
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone_number = $_SESSION['phone_number'];
$password = $_SESSION['password'];
$confirm_password = $_SESSION['confirm_password'];
$user_type = $_SESSION['user_type'];

// Check if passwords match
if ($password != $confirm_password) {
    $error = 'Passwords do not match!';
} else {
    // Check if user already exists
    $select_query = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($result) > 0) {
        $error = 'User already exists!';
    } else {
        // Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        $insert_query = "INSERT INTO user_form (name, email, phone_number, password, user_type) VALUES ('$name', '$email', '$phone_number', '$hashed_password', '$user_type')";
        if (mysqli_query($conn, $insert_query)) {
            // Registration successful
            echo "<script>
                    alert('Registration successful!');
                    window.location.href = '" . ($user_type == 'admin' ? 'inner_page.php' : 'student_page.php') . "';
                  </script>";
            
            // Clear session variables after successful registration
            session_unset();
            session_destroy();
            exit; // Make sure to exit after redirection
        } else {
            $error = 'Error: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Complete Registration</title>
</head>
<body>
    <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
</body>
</html>
