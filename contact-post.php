<?php

include 'database/dbcon.php';
function handleFormSubmission($data) {
    global $database;

    if (!empty($data['name']) && !empty($data['email']) && !empty($data['message'])) {
        $collectionReference = $database->getReference('contact_form_submissions');
        $newDocument = $collectionReference->push($data);

        return $newDocument->getKey();
    } else {
        return 'error-missing-fields';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $contactNo = $_POST['contact_no'] ?? '';
    $message = $_POST['message'] ?? '';
    $timestamp = time();

    $formData = [
        'name' => $name,
        'email' => $email,
        'contact_no' => $contactNo,
        'message' => $message,
        'timestamp' => $timestamp,
    ];

    $result = handleFormSubmission($formData);

    if ($result === 'error-missing-fields') {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
        exit();
    } else {
        echo json_encode(['status' => 'success', 'documentId' => $result]);
        exit(); 
    }
}
?>

