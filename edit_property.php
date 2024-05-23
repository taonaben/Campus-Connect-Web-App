<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit;
}

$admin_id = $_SESSION['user_id'];

// Check if property id is set in the GET parameters
if (!isset($_GET['house_id']) || empty($_GET['house_id'])) {
    echo "Property ID is missing.";
    exit;
}

$property_id = $_GET['house_id'];

// Fetch property details
$sql = "SELECT * FROM properties WHERE house_id = '$property_id' AND admin_id = '$admin_id'";
$result = $conn->query($sql);
$property = $result->fetch_assoc();

if (!$property) {
    echo "Property not found.";
    exit;
}

if (isset($_POST['submit'])) {
    // Capture and sanitize input
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $add_info = mysqli_real_escape_string($conn, $_POST['add_info']);
    $house_type = $_POST['house_type'];
    $walkingDistance = mysqli_real_escape_string($conn, $_POST['distance']);

    $waterTank = isset($_POST['water_tank']) ? 1 : 0;
    $wifi = isset($_POST['wifi']) ? 1 : 0;
    $solar = isset($_POST['solar']) ? 1 : 0;
    $security = isset($_POST['security']) ? 1 : 0;
    $caretaker = isset($_POST['caretaker']) ? 1 : 0;
    $single = isset($_POST['single']) ? 1 : 0;
    $double = isset($_POST['double']) ? 1 : 0;
    $sharing3 = isset($_POST['3_sharing']) ? 1 : 0;
    $other = isset($_POST['other']) ? 1 : 0;

    // Handle file upload for images
    // Similar logic as in the initial form for handling image uploads can be applied here

    // Update query
    $sql = "UPDATE properties SET
        price = '$price',
        location = '$location',
        water_tank = '$waterTank',
        wifi = '$wifi',
        security = '$security',
        caretaker = '$caretaker',
        solar_backup = '$solar',
        single = '$single',
        double_room = '$double',
        3_sharing = '$sharing3',
        other = '$other',
        distance = '$walkingDistance',
        add_info = '$add_info',
        house_type = '$house_type'
        WHERE id = '$property_id' AND admin_id = '$admin_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Property updated successfully.";
        header('Location: list_properties.php');
        exit;
    } else {
        echo "Error updating property: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Edit home</title>

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
        <h1 class="my-4">Edit Property</h1>
        <form method="POST" enctype="multipart/form-data" action="">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input name="location" type="text" id="location" class="form-control" placeholder="Location" value="<?php echo htmlspecialchars($property['location']); ?>" />
                        <label for="location">Location</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="price" type="number" id="price" class="form-control" placeholder="Price In USD" value="<?php echo htmlspecialchars($property['price']); ?>" />
                        <label for="price">Price per month In USD</label>
                    </div>

                    <div class="mb-3">
                        <label for="house_type" class="form-label">House Type</label>
                        <select name="house_type" id="house_type" class="form-select">
                            <option value="boys" <?php echo $property['house_type'] == 'boys' ? 'selected' : ''; ?>>Boys only</option>
                            <option value="girls" <?php echo $property['house_type'] == 'girls' ? 'selected' : ''; ?>>Girls only</option>
                            <option value="mixed" <?php echo $property['house_type'] == 'mixed' ? 'selected' : ''; ?>>Mixed</option>
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="distance" type="number" id="distance" class="form-control" placeholder="Distance" value="<?php echo htmlspecialchars($property['distance']); ?>" />
                        <label for="distance">Distance to CUT (in km)</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea name="add_info" class="form-control" placeholder="Additional Information" id="add_info"><?php echo htmlspecialchars($property['add_info']); ?></textarea>
                        <label for="add_info">Additional Information</label>
                    </div>
                    <div class="bg-light c-rounded-1 p-3 mb-3">
                        <h5>Upload Images</h5>
                        <div class="mb-3">
                            <label for="image1" class="form-label">Image 1</label>
                            <input class="form-control" type="file" name="image1" id="image1">
                        </div>
                        <div class="mb-3">
                            <label for="image2" class="form-label">Image 2</label>
                            <input class="form-control" type="file" name="image2" id="image2">
                        </div>
                        <div class="mb-3">
                            <label for="image3" class="form-label">Image 3</label>
                            <input class="form-control" type="file" name="image3" id="image3">
                        </div>
                        <div class="mb-3">
                            <label for="image4" class="form-label">Image 4</label>
                            <input class="form-control" type="file" name="image4" id="image4">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="bg-light c-rounded-1 p-3 mb-3">
                        <h5>Room types</h5>
                        <div class="form-check">
                            <input class="form-check-input" name="single" type="checkbox" id="single" <?php echo $property['single'] ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="single">Singles</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="double" type="checkbox" id="double" <?php echo $property['double_room'] ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="double">Doubles</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="3_sharing" type="checkbox" id="3_sharing" <?php echo $property['3_sharing'] ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="3_sharing">3 Sharings</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="other" type="checkbox" id="other" <?php echo $property['other'] ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>

                    <div class="bg-light c-rounded-1 p-3 mb-3">
                        <h5>Features</h5>
                        <div class="form-check">
                            <input class="form-check-input" name="water_tank" type="checkbox" id="water_tank" <?php echo $property['water_tank'] ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="water_tank">Water Tank</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="wifi" type="checkbox" id="wifi" <?php echo $property['wifi'] ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="wifi">Wi-Fi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="solar" type="checkbox" id="solar" <?php echo $property['solar_backup'] ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="solar">Solar</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="security" type="checkbox" id="security" <?php echo $property['security'] ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="security">Security</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="caretaker" type="checkbox" id="caretaker" <?php echo $property['caretaker'] ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="caretaker">Caretaker</label>
                        </div>
                    </div>

                    <div class="bg-light c-rounded-1 p-3 mb-3">
                        <h5>Upload Images</h5>
                        
                        <div class="mb-3">
                            <label for="image5" class="form-label">Image 5</label>
                            <input class="form-control" type="file" name="image5" id="image5">
                        </div>
                        <div class="mb-3">
                            <label for="image6" class="form-label">Image 6</label>
                            <input class="form-control" type="file" name="image6" id="image6">
                        </div>
                        <div class="mb-3">
                            <label for="image7" class="form-label">Image 7</label>
                            <input class="form-control" type="file" name="image7" id="image7">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update Property</button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>