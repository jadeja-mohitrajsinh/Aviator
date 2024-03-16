<?php
session_start();
include 'database/dbcon.php'; // Include your Firebase setup file

if(isset($_POST['Submit-SignIn'])){
    $email = $_POST['signInEmail'];
    $password = $_POST['signInPassword'];

    // Check if the email is in a valid format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format. Please enter a valid email address.";
        header('Location: login.php');
        exit;
    }

    try {
        // Attempt to sign in
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        $idTokenString = $signInResult->idToken();

        // Handle successful sign-in
        $_SESSION['idTokenString'] = $idTokenString;
        $_SESSION['status'] = "User signed in successfully";
        header('Location: home.php');
        $_SESSION['logged_in'] = true;
        exit;
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        // Handle user not found
        $_SESSION['error'] = "User not found. Please check your email address or sign up.";
        header('Location: login.php');
        exit;
    } catch (\Exception $e) {
        // Handle other exceptions
        // Check if the exception message contains the "INVALID_PASSWORD" error code
        if (strpos($e->getMessage(), 'INVALID_PASSWORD') !== false) {
            $_SESSION['error'] = "Invalid password. Please try again.";
        } else {
            $_SESSION['error'] = "An error occurred during sign-in. Please try again later.";
        }
        header('Location: login.php');
        exit;
    }
}
?>
