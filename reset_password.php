<?php
// reset_password.php

// Include database connection and other necessary files
include 'database/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    // Include Firebase PHP SDK
    require __DIR__ . '/vendor/autoload.php';

    try {
        // Send password reset link
        $auth->sendPasswordResetLink($email);
        // Return success response
        echo json_encode(array("success" => true, "message" => "Password reset email sent successfully!"));
    } catch (\Kreait\Firebase\Exception\Auth\EmailNotFound $e) {
        // Return error response
        echo json_encode(array("success" => false, "message" => "Email not found!"));
    } catch (Exception $e) {
        // Return error response
        echo json_encode(array("success" => false, "message" => "An error occurred: " . $e->getMessage()));
    }
}
?>
