<?php
// reset_password.php
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

include 'database/dbcon.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    // Include Firebase PHP SDK
    require __DIR__ . '/vendor/autoload.php';


    try {
        $auth->sendPasswordResetLink($email);
        echo "Password reset email sent successfully!";
    } catch (\Kreait\Firebase\Exception\Auth\EmailNotFound $e) {
        echo "Email not found!";
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
