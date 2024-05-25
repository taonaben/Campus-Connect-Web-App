<?php
session_start();

if ($_SESSION['user_type'] === 'admin') {
    // Check if the payment is confirmed for admin users
    if (!isset($_SESSION['payment_confirmed']) || $_SESSION['payment_confirmed'] !== true) {
        // If payment is not confirmed, redirect to ecocash_payment.php
        header('Location: ecocash_payment.php');
        exit;
    }
} else {
    $_SESSION['payment_confirmed'] = true;
    // For non-admin users, proceed to complete_registration.php
    header('Location: complete_registration.php');
    exit;
}
?>
 