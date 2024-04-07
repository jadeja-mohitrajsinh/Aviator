<?php
session_start();
require 'vendor/autoload.php';
include 'database/dbcon.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

try {
    $user = $auth->getUserByEmail($_SESSION['email']);
    $userId = $user->uid;
} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    $_SESSION['error'] = "User not found.";
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['itemKey'])) {
        $itemKey = $_POST['itemKey'];
        $cartReference = $database->getReference('carts/' . $userId . '/' . $itemKey);
        $cartReference->remove();
        // Respond with a success message or status code
        http_response_code(200);
        echo 'Item removed successfully';
    } else {
        // Respond with an error status code
        http_response_code(400);
        echo 'Invalid request';
    }
} else {
    // Respond with an error status code
    http_response_code(405);
    echo 'Method Not Allowed';
}
?>
