<?php
// Include the database configuration file
include 'config.php';

// Check if house_id parameter is set
if (isset($_GET['house_id'])) {
    // Sanitize the input to prevent SQL injection
    $house_id = mysqli_real_escape_string($conn, $_GET['house_id']);

    // Construct the SQL DELETE query
    $sql = "DELETE FROM properties WHERE house_id = '$house_id'";

    // Execute the DELETE query
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the page listing properties
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // Error handling if the deletion fails
        echo "Error deleting property: " . $conn->error;
    }
} else {
    // Redirect back to the page listing properties if house_id parameter is missing
    header("Location: admin_dashboard.php");
    exit;
}

// Close the database connection
$conn->close();
?>
