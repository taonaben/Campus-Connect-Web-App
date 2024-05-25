<?php
// Include the database configuration file
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])|| $_SESSION['user_type'] !== 'user') {
	header("Location: login_form.php");
}

// Check if the 'house_id' parameter is set in the URL
if (isset($_GET['house_id'])) {
    // Get the property ID from the URL
    $property_id = intval($_GET['house_id']); // Ensure it is an integer

    // Debugging: Check the received house_id
    error_log("Received house_id: " . $property_id);

    // Query to fetch the property and admin details
    $sql = "SELECT properties.*, user_form.phone_number 
            FROM properties 
            JOIN user_form ON properties.admin_id = user_form.id 
            WHERE properties.house_id = ?";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        error_log("MySQL Prepare Error: " . $conn->error);
        die("Database error. Please try again later.");
    }

    $stmt->bind_param("i", $property_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the property exists
    if ($result->num_rows > 0) {
        // Fetch the property details
        $property = $result->fetch_assoc();
        $phone_number = $property['phone_number']; // Retrieve the phone number from the result
    } else {
        // Property not found
        echo "Property not found.";
        exit;
    }

    // Close the statement
    $stmt->close();
} else {
    // No property ID provided
    echo "No property ID provided.";
    exit;
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body class="bg-success">
    <!--START OF HEADER -->
    <?php include './headers/customer_header.php' ?>
    <!--END OF HEADER -->

    <main id="view-slides" class="container py-4 pb-5 px-2">
        <div class="c-rounded-2 p-4 pb-5 p-lg-5 bg-white">

            <div class="mb-5">
                <button onclick="goBack()" class="btn btn-sm px-3 btn-success rounded-pill">
                    <i class="bi bi-arrow-left me-2"></i> Go Back
                </button>
            </div>

            <div class="row">
                <div class="col-lg">
                    <div class="position-relative">
                        <!-- Dynamically generated slides -->
                        <?php for ($i = 1; $i <= 6; $i++) : ?>
                            <?php if (!empty($property['img' . $i])) : ?>
                                <div class="slide">
                                    <div class="image-number"><?php echo $i . " / 6"; ?></div>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($property['img' . $i]); ?>" style="width: 100%" />
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <!-- Navigation buttons -->
                        <a class="btn btn-dark c-rounded-1 position-absolute top-50 start-0" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="btn btn-dark c-rounded-1 position-absolute top-50 end-0" onclick="plusSlides(1)">&#10095;</a>
                    </div>

                    <!-- Thumbnail previews -->
                    <div class="d-flex overflowx-scroll">
                        <?php for ($i = 1; $i <= 6; $i++) : ?>
                            <?php if (!empty($property['img' . $i])) : ?>
                                <div class="pe-1 py-1">
                                    <img class="slide-preview" src="data:image/jpeg;base64,<?php echo base64_encode($property['img' . $i]); ?>" onclick="currentSlide(<?php echo $i; ?>)" />
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>

                    <div class="bg-light c-rounded-1 p-3 mb-3">
                        <h5>Description</h5>
                        <p>
                            <?php echo htmlspecialchars($property['add_info'], ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>

                    <div class="bg-light c-rounded-1 p-3 mb-3">
                        <?php if ($phone_number) : ?>
                            <a href="https://wa.me/<?php echo htmlspecialchars($phone_number, ENT_QUOTES, 'UTF-8'); ?>?text=I%20am%20interested%20in%20your%20property%20listed%20on%20Campus-Connect" class="btn btn-success">
                                <i class="bi bi-whatsapp"></i> Contact via WhatsApp
                            </a>
                        <?php else : ?>
                            <p>No phone number available</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="bg-light c-rounded-1 p-3 mb-3">
                        <h5>House details</h5>
                        <div>
                            <div class="mb-3">
                                <i class="bi bi-geo-alt"></i><?php echo htmlspecialchars($property['location'], ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                            <div class="mb-3">
                                <i class="bi bi-gender-ambiguous"></i> <?php echo htmlspecialchars($property['house_type'], ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                            <div class="mb-3"><i class="bi bi-geo"></i> <?php echo htmlspecialchars($property['distance'], ENT_QUOTES, 'UTF-8'); ?> km to CUT</div>
                        </div>

                        <div>
                            <div class="mt-4">
                                <div class="">
                                    <i class="bi bi-currency-dollar"></i> <?php echo htmlspecialchars($property['price'], ENT_QUOTES, 'UTF-8'); ?>/month
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="bg-light c-rounded-1 p-3 mb-3">
                                <h5>Amenities</h5>
                                <?php if ($property['water_tank']) : ?>
                                    <div class="mb-2"><i class="bi bi-droplet"></i> Water Tank</div>
                                <?php endif; ?>
                                <?php if ($property['wifi']) : ?>
                                    <div class="mb-2"><i class="bi bi-wifi"></i> Wi-Fi</div>
                                <?php endif; ?>
                                <?php if ($property['solar_backup']) : ?>
                                    <div class="mb-2"><i class="bi bi-sun"></i> Solar</div>
                                <?php endif; ?>
                                <?php if ($property['security']) : ?>
                                    <div class="mb-2"><i class="bi bi-shield-lock"></i> Security</div>
                                <?php endif; ?>
                                <?php if ($property['caretaker']) : ?>
                                    <div class="mb-2"><i class="bi bi-person-badge"></i> Caretaker</div>
                                <?php endif; ?>
                            </div>

                            <div class="mt-4">
                                <div class="bg-light c-rounded-1 p-3 mb-3">
                                    <h5>Rooms available</h5>
                                    <?php if ($property['single']) : ?>
                                        <div class="mb-2"><i class="bi bi-house-door"></i> Single Rooms</div>
                                    <?php endif; ?>
                                    <?php if ($property['double_room']) : ?>
                                        <div class="mb-2"><i class="bi bi-house"></i> Double Rooms</div>
                                    <?php endif; ?>
                                    <?php if ($property['3_sharing']) : ?>
                                        <div class="mb-2"><i class="bi bi-people"></i> 3 Sharing</div>
                                    <?php endif; ?>
                                    <?php if ($property['other']) : ?>
                                        <div class="mb-2"><i class="bi bi-plus-circle"></i> Other</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </main>

    <footer class="p-4 bg-success text-center text-white">
        <small>&copy; All Rights Reserved. Campus-Connect</small>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.style.display = 'none';
            }

            var slideIndex = 1;
            showSlides(slideIndex);

            // Next/previous controls
            window.plusSlides = function(n) {
                showSlides(slideIndex += n);
            }

            // Thumbnail image controls
            window.currentSlide = function(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("slide");
                var slidePreviews = document.getElementsByClassName("slide-preview");
                if (n > slides.length) {
                    slideIndex = 1;
                }
                if (n < 1) {
                    slideIndex = slides.length;
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < slidePreviews.length; i++) {
                    slidePreviews[i].className = slidePreviews[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                slidePreviews[slideIndex - 1].className += " active";
            }
        });

        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>