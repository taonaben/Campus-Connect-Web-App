<?php
// Connect to the database (assuming you have a $conn variable already established)
include 'config.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_payment'])) {
  
    
    $sql = "INSERT INTO user_form (sub) VALUES (1)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Payment confirmed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>


<!DOCTYPE html>
<html>

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
    <link href="assets/css/payment.css" rel="stylesheet" />

    <script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/main.js"></script>
</head>

<body>

    <div class="main">
        <div class="container">
            <svg id="exit" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.35288 8.95043C4.00437 6.17301 6.17301 4.00437 8.95043 3.35288C10.9563 2.88237 13.0437 2.88237 15.0496 3.35288C17.827 4.00437 19.9956 6.17301 20.6471 8.95044C21.1176 10.9563 21.1176 13.0437 20.6471 15.0496C19.9956 17.827 17.827 19.9956 15.0496 20.6471C13.0437 21.1176 10.9563 21.1176 8.95044 20.6471C6.17301 19.9956 4.00437 17.827 3.35288 15.0496C2.88237 13.0437 2.88237 10.9563 3.35288 8.95043Z" stroke="#1B1B1B" stroke-width="1.5" />
                <path d="M13.7678 10.2322L10.2322 13.7678M13.7678 13.7678L10.2322 10.2322" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
            </svg>

            <div class="heading">
                <h1>Payment details</h1>
            </div>

            <table>
                <tr>
                    <th>Price:</th>
                    <td><i class="bi bi-currency-dollar"></i> 6.99</td>
                </tr>
            </table>

            <form id="paymentForm" action="process_payment.php" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Name" required />
                <br>
                <label for="phone">Phone number</label>
                <input type="text" id="phone" name="phone" placeholder="+263..." required />
                <br>
                <input type="hidden" name="submit_payment" value="1">
                <div class="btn" onclick="document.getElementById('paymentForm').submit();">
                    <span id="submit">Confirm Payment</span>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
