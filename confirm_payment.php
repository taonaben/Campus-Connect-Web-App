<?php
session_start();

if (isset($_POST['confirm_payment'])) {
    $_SESSION['payment_confirmed'] = true;

    // Redirect to registration completion page
    header('Location: complete_registration.php');
    exit;
} else {
    // If accessed directly, redirect to registration page
    header('Location: register.php');
    exit;
}
?>
