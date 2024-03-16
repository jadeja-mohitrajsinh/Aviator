<?php
session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php"); // Redirect to your login page
    exit; // Stop further execution
}

// Logout functionality
if (isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page after logout
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to Home</h1>
    <p>This is the home page content.</p>

    <!-- Add a logout form -->
    <form method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
