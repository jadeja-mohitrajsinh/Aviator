<?php
require 'vendor/autoload.php';
include 'database/dbcon.php'; 
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
try {
    $user = $auth->getUserByEmail($_SESSION['email']);
    $displayName = $user->displayName;
} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    $_SESSION['error'] = "User not found.";
    header('Location: login.php');
    exit;
}

$reference = $database->getReference('aircrafts');
$aircrafts = $reference->getValue();

if(isset($_GET['query']) && !empty($_GET['query'])) {
    // Check if 'query' parameter is set and not empty
    $searchTerm = strtolower($_GET['query']); // Get the search term from the query parameter and convert to lowercase
    $filteredAircrafts = []; // Initialize an empty array to store filtered aircrafts
    foreach ($aircrafts as $aircraftId => $aircraft) {
        // Convert all fields to lowercase for case-insensitive matching
        $manufacturer = strtolower($aircraft['manufacturer']);
        $model = strtolower($aircraft['model']);
        $price = strtolower($aircraft['price']);
        
        // Define a regular expression pattern to match the search term as a whole word or as part of a word
        $pattern = "/\b" . preg_quote($searchTerm, '/') . "\b/i"; // Use preg_quote() to escape special characters and /i for case-insensitive matching
        
        // Check if the search term matches any field using regular expressions
        if (preg_match($pattern, $manufacturer) ||
            preg_match($pattern, $model) ||
            preg_match($pattern, $price) ||
            preg_grep($pattern, array_map('strtolower', $aircraft['cockpitFeatures']))) {
            // If any match is found, add the aircraft to the filtered list
            $filteredAircrafts[$aircraftId] = $aircraft;
        }
    }
    // Assign the filtered aircrafts to the main aircrafts array
    $aircrafts = $filteredAircrafts;
}

try {
    $user = $auth->getUserByEmail($_SESSION['email']);
    $displayName = $user->displayName;
    $userId = $user->uid; // Get user ID
} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    $_SESSION['error'] = "User not found.";
    header('Location: login.php');
    exit;
}

// Handle adding items to the cart
if(isset($_GET['add_to_cart']) && isset($_GET['aircraft_id'])) {
    $aircraftId = $_GET['aircraft_id'];
    $selectedAircraft = $aircrafts[$aircraftId];
    $cartReference = $database->getReference('carts/' . $userId);
    $cartReference->push($selectedAircraft);
    header("Location: home.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Jets Selling</title>
    <link rel="stylesheet" href="css/Nav-Bar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="snonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php
    include 'components/Nav-Bar.php'; 
    // include 'components/Filter-sidebar.php';?>


    <div class="head-container">
        <div id="welcome-message">Welcome, <?php echo $displayName; ?>!</div>
        <div class="search-container">
            <form action="home.php" method="get">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit"><i class="fas fa-search"></i></button>
        </div>
        </form>
    </div>
    </div>

    <div class="product-sp">
        <div class="container">
            <div class="row" id="product-container">
                <?php
foreach ($aircrafts as $aircraftId => $aircraft) {
    // Extract aircraft data
    $manufacturer = $aircraft['manufacturer'];
    $model = $aircraft['model'];
    $price = $aircraft['price'];
    $imageUrl = str_replace('images/', '', $aircraft['image']); 
    $imageUrl = $baseStorageUrl . urlencode($imageUrl) . '?alt=media';
    $features = $aircraft['cockpitFeatures'];

    // Generate unique modal ID for each product
    $modalId = 'infoModal_' . $aircraftId;
?>

                <div class="col-md-6 card-color">
                    <div class="card mb-4">
                        <div class="row no-gutters">
                            <div class="col-md-6 card-img-wrapper p-3">
                                <img src="<?php echo $imageUrl; ?>" class="card-img" alt="Airplane Image">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $manufacturer; ?></h5>
                                    <p class="card-text">Model: <?php echo $model; ?></p>
                                    <p class="card-text">Price: $<?php echo $price; ?></p>
                                    <ul>
                                        <?php foreach ($features as $feature): ?>
                                        <li><?php echo $feature; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <!-- Add buttons or links as needed -->
                                    <a href="home.php?add_to_cart=true&aircraft_id=<?php echo $aircraftId; ?>"
                                        class="btn btn-primary mt-3 w-100" id="cart-btn">Cart</a>
                                    <!-- Use the unique modal ID for each product -->
                                    <a href="#" class="btn btn-primary mt-3 w-100" data-bs-toggle="modal"
                                        data-bs-target="#<?php echo $modalId; ?>" id="cart-btn">Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1"
                    aria-labelledby="<?php echo $modalId; ?>Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="<?php echo $modalId; ?>Label"><?php echo $model; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                                <!-- Add modal body content here -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="<?php echo $imageUrl; ?>" alt="Main Aircraft Image"
                                                class="img-fluid mb-3">
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Display basic information inline -->
                                            <h1><?php echo $manufacturer; ?></h1>
                                            <h3>Price: $<?php echo $price; ?></h3>
                                            <!-- Add other basic information here -->
                                        </div>
                                    </div>
                                    <div class="accordion" id="accordionDetails">
                                        <!-- Performance Section -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingPerformance">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapsePerformance" aria-expanded="true"
                                                    aria-controls="collapsePerformance">
                                                    Performance
                                                </button>
                                            </h2>
                                            <div id="collapsePerformance" class="accordion-collapse collapse"
                                                aria-labelledby="headingPerformance" data-bs-parent="#accordionDetails">
                                                <div class="accordion-body">
                                                    <p>Maximum Range: <?php echo $aircraft['maximumRange']; ?></p>
                                                    <p>High-Speed Cruise:
                                                        <?php echo $aircraft['highSpeedCruise']; ?></p>
                                                    <p>Long-Range Cruise:
                                                        <?php echo $aircraft['longRangeCruise']; ?></p>
                                                    <p>Maximum Operating Mach:
                                                        <?php echo $aircraft['maximumOperatingMach']; ?></p>
                                                    <p>Takeoff Distance: <?php echo $aircraft['takeoffDistance']; ?>
                                                    </p>
                                                    <p>Initial Cruise Altitude:
                                                        <?php echo $aircraft['initialCruiseAltitude']; ?></p>
                                                    <p>Maximum Cruise Altitude:
                                                        <?php echo $aircraft['maximumCruiseAltitude']; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Weights Section -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingWeights">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseWeights"
                                                    aria-expanded="false" aria-controls="collapseWeights">
                                                    Weights
                                                </button>
                                            </h2>
                                            <div id="collapseWeights" class="accordion-collapse collapse"
                                                aria-labelledby="headingWeights" data-bs-parent="#accordionDetails">
                                                <div class="accordion-body">
                                                    <p>Maximum Takeoff Weight:
                                                        <?php echo $aircraft['maximumTakeoffWeight']; ?></p>
                                                    <p>Maximum Landing Weight:
                                                        <?php echo $aircraft['maximumLandingWeight']; ?></p>
                                                    <p>Maximum Zero Fuel Weight:
                                                        <?php echo $aircraft['maximumZeroFuelWeight']; ?></p>
                                                    <p>Basic Operating Weight (including 4 crew):
                                                        <?php echo $aircraft['basicOperatingWeight']; ?></p>
                                                    <p>Maximum Payload: <?php echo $aircraft['maximumPayload']; ?>
                                                    </p>
                                                    <p>Maximum Payload/Full Fuel:
                                                        <?php echo $aircraft['maximumPayloadFullFuel']; ?></p>
                                                    <p>Maximum Fuel: <?php echo $aircraft['maximumFuel']; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Systems Section -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingSystems">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseSystems"
                                                    aria-expanded="false" aria-controls="collapseSystems">
                                                    Systems
                                                </button>
                                            </h2>
                                            <div id="collapseSystems" class="accordion-collapse collapse"
                                                aria-labelledby="headingSystems" data-bs-parent="#accordionDetails">
                                                <div class="accordion-body">
                                                    <p>Avionics: <?php echo $aircraft['avionics']; ?></p>
                                                    <p>Engines: <?php echo $aircraft['engines']; ?></p>
                                                    <p>Rated Takeoff Thrust (each):
                                                        <?php echo $aircraft['ratedTakeoffThrust']; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Measurements Section -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingMeasurements">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseMeasurements"
                                                    aria-expanded="false" aria-controls="collapseMeasurements">
                                                    Measurements
                                                </button>
                                            </h2>
                                            <div id="collapseMeasurements" class="accordion-collapse collapse"
                                                aria-labelledby="headingMeasurements"
                                                data-bs-parent="#accordionDetails">
                                                <div class="accordion-body">
                                                    <p>Finished Cabin Height:
                                                        <?php echo $aircraft['finishedCabinHeight']; ?></p>
                                                    <p>Finished Cabin Width:
                                                        <?php echo $aircraft['finishedCabinWidth']; ?></p>
                                                    <p>Cabin Length (excluding baggage):
                                                        <?php echo $aircraft['cabinLength']; ?></p>
                                                    <p>Total Interior Length:
                                                        <?php echo $aircraft['totalInteriorLength']; ?></p>
                                                    <p>Cabin Volume: <?php echo $aircraft['cabinVolume']; ?></p>
                                                    <p>Baggage Compartment Volume:
                                                        <?php echo $aircraft['baggageCompartmentVolume']; ?></p>
                                                    <p>Exterior Height: <?php echo $aircraft['exteriorHeight']; ?>
                                                    </p>
                                                    <p>Exterior Length: <?php echo $aircraft['exteriorLength']; ?>
                                                    </p>
                                                    <p>Overall Wingspan: <?php echo $aircraft['overallWingspan']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>



            </div>
        </div>
    </div>


</body>

</html>