<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit;
}

$admin_id = $_SESSION['user_id'];

// Fetch properties from the database
$sql = "SELECT * FROM properties WHERE admin_id = '$admin_id'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Admin dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet" />

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="assets/css/style.css" rel="stylesheet" />

    <script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/main.js"></script>
</head>

<body>
    <!--START OF HEADER -->
    <?php include './headers/landlord_header.php' ?>
    <!--END OF HEADER -->

    <div class="container">
        <h1 class="my-4">My Properties</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>House ID</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>House Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                    <td><?php echo htmlspecialchars($row['house_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['location']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td><?php echo htmlspecialchars($row['house_type']); ?></td>
                        <td>
                            <a href="edit_property.php?house_id=<?php echo $row['house_id']; ?>" class="btn btn-primary">Edit</a>
                            <a class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
$conn->close();
?>