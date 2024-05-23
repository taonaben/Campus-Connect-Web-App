<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

@include 'config.php';
session_start();


if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Prepared statement to check user credentials
    $select_query = "SELECT * FROM user_form WHERE email = ?";
    $stmt = mysqli_prepare($conn, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // User exists, fetch user details
        $row = mysqli_fetch_array($result);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Store user information in session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_type'] = $row['user_type'];

            // Debugging output
            echo "User type: " . $row['user_type']; // Remove this after testing

            // Redirect based on user_type
            if ($row['user_type'] == 'admin') {
                header('Location: ./inner_page.php');
                exit;
            } elseif ($row['user_type'] == 'user') {
                header('Location: ./student_page.php');
                exit;
            } else {
                echo "Unknown user type."; // Remove this after testing
            }
        } else {
            // Incorrect password
            $error = 'Incorrect email or password!';
        }
    } else {
        // Incorrect email
        $error = 'Incorrect email or password!';
    }

    mysqli_stmt_close($stmt);
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
    <link href="assets/css/styles2.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/main.js"></script>
</head>

<body>
    
    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <?php
            if (isset($error)) {
                echo '<p style="color:red;">' . $error . '</p>';
            }
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="register_form.php">register now</a></p>
        </form>
    </div>
</body>

</html>