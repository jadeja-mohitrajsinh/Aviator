<?php
// change_name.php
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
include 'database/dbcon.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the new_name parameter is set in the POST request
    if (isset($_POST["new_name"])) {
        $newName = $_POST["new_name"];
        
        // Include Firebase PHP SDK
        require __DIR__ . '/vendor/autoload.php';

        try {
            // Retrieve user's email from the form
            $email = $_POST["email"];
            
            // Get user record by email
            $userRecord = $auth->getUserByEmail($email);
            $userId = $userRecord->uid;

            // Update user's display name
            $updatedUser = $auth->updateUser($userId, ['displayName' => $newName]);
            
            echo "Name updated successfully!";
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            echo "User not found!";
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    } else {
        echo "New name not provided.";
    }
}
?>
