<?php
session_start();

// Include Firebase PHP SDK
require 'vendor/autoload.php'; // Adjust the path as needed

use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage;

// Initialize Firebase
$firebaseDatabaseUri = 'https://aviator-a150a-default-rtdb.firebaseio.com';
$firebaseCredentialPath = 'database\aviator-a150a-firebase-adminsdk-lhv3p-8bfc4c3fc4.json';

$factory = (new Factory())
    ->withServiceAccount($firebaseCredentialPath)
    ->withDatabaseUri($firebaseDatabaseUri);

$database = $factory->createDatabase();
$storage = $factory->createStorage();

function handleFormSubmission($data, $file) {
    global $database, $storage;

    // File upload handling
    $filePath = '';
    if (!empty($file['image']['tmp_name'])) {
        $imageData = file_get_contents($file['image']['tmp_name']);
        $filePath = 'images/' . uniqid() . '_' . $file['image']['name'];
        $storage->getBucket()->upload($imageData, ['name' => $filePath]);
    }

    // Form data handling
    //if (empty($data['year']) || empty($data['manufacturer']) || empty($data['model']) || empty($data['engines']) || empty($data['capacity']) ||empty($data['price'])){
     //   return 'error-missing-fields';
   //}


    $year = $data['year'];
    $manufacturer = $data['manufacturer'];
    $model = $data['model'];
    $engines_count = $data['engines_count'];
    $capacity = $data['capacity'];
    $price = $data['price'];
    $maximumRange = $data['maximumRange'];
    $highSpeedCruise = $data['highSpeedCruise'];
    $longRangeCruise = $data['longRangeCruise'];
    $maximumOperatingMach = $data['maximumOperatingMach'];
    $takeoffDistance = $data['takeoffDistance'];
    $initialCruiseAltitude = $data['initialCruiseAltitude'];
    $maximumCruiseAltitude = $data['maximumCruiseAltitude'];
    $maximumTakeoffWeight = $data['maximumTakeoffWeight'];
    $maximumLandingWeight = $data['maximumLandingWeight'];
    $maximumZeroFuelWeight = $data['maximumZeroFuelWeight'];
    $basicOperatingWeight = $data['basicOperatingWeight'];
    $maximumPayload = $data['maximumPayload'];
    $maximumPayloadFullFuel = $data['maximumPayloadFullFuel'];
    $maximumFuel = $data['maximumFuel'];
    $avionics = $data['avionics'];
    $engines = $data['engines'];
    $ratedTakeoffThrust = $data['ratedTakeoffThrust'];
    $finishedCabinHeight = $data['finishedCabinHeight'];
    $finishedCabinWidth = $data['finishedCabinWidth'];
    $cabinLength = $data['cabinLength'];
    $totalInteriorLength = $data['totalInteriorLength'];
    $cabinVolume = $data['cabinVolume'];
    $baggageCompartmentVolume = $data['baggageCompartmentVolume'];
    $exteriorHeight = $data['exteriorHeight'];
    $exteriorLength = $data['exteriorLength'];
    $overallWingspan = $data['overallWingspan'];
    $image = $filePath;
    $imageoverhead = $filePath;
    $cockpitFeatures = $data['cockpitFeatures'];
    

    $aircraftData = [
        'year' => $year,
        'cockpitFeatures' => $cockpitFeatures,
        'manufacturer' => $manufacturer,
        'model' => $model,
        'engines_count' => $engines_count,
        'capacity' => $capacity,
        'image' => $image,
        'image-overhead' => $imageoverhead,
        'price' => $price,
        'maximumRange' => $maximumRange,
        'highSpeedCruise' => $highSpeedCruise,
        'longRangeCruise' => $longRangeCruise,
        'maximumOperatingMach' => $maximumOperatingMach,
        'takeoffDistance' => $takeoffDistance,
        'initialCruiseAltitude' => $initialCruiseAltitude,
        'maximumCruiseAltitude' => $maximumCruiseAltitude,
        'maximumTakeoffWeight' => $maximumTakeoffWeight,
        'maximumLandingWeight' => $maximumLandingWeight,
        'maximumZeroFuelWeight' => $maximumZeroFuelWeight,
        'basicOperatingWeight' => $basicOperatingWeight,
        'maximumPayload' => $maximumPayload,
        'maximumPayloadFullFuel' => $maximumPayloadFullFuel,
        'maximumFuel' => $maximumFuel,
        'avionics' => $avionics,
        'ratedTakeoffThrust' => $ratedTakeoffThrust,
        'finishedCabinHeight' => $finishedCabinHeight,
        'finishedCabinWidth' => $finishedCabinWidth,
        'cabinLength' => $cabinLength,
        'totalInteriorLength' => $totalInteriorLength,
        'cabinVolume' => $cabinVolume,
        'baggageCompartmentVolume' => $baggageCompartmentVolume,
        'exteriorHeight' => $exteriorHeight,
        'exteriorLength' => $exteriorLength,
        'overallWingspan' => $overallWingspan,
        'engines' => $engines
    ];


    $collectionReference = $database->getReference('aircrafts');
    $newDocument = $collectionReference->push($aircraftData);
    return $newDocument->getKey();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = handleFormSubmission($_POST, $_FILES);
    if ($result === 'error-missing-fields') {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
        exit();
    } else {
        echo json_encode(['status' => 'success', 'documentId' => $result]);
        exit();
    }
}
?>
