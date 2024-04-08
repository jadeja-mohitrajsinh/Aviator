<?php
session_start();
include 'database/dbcon.php';
include 'components/Nav-Bar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preload" href="css/Nav-Bar.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="css/style.css"> 
    <script src="js/script.js"></script>
    <style>
    body {
        background-color: #DAC0A3;
        /* Set the background color */
    }

    .container {
        max-width: 450px;
        /* Increased container width */
        margin-top: 100px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #0F2C59;
        /* Your primary color */
        color: #fff;
        border-bottom: none;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 15px;
        /* Increased padding */
        font-size: 1.4rem;
        /* Increased font size */
    }

    .card-body {
        padding: 15px;
        /* Increased padding */
    }

    .btn-primary {
        background-color: #0F2C59;
        /* Your primary color */
        border-color: #0F2C59;
        /* Your primary color */
    }

    .btn-primary:hover {
        background-color: #EADBC8;
        /* Your secondary color */
        border-color: #EADBC8;
        /* Your secondary color */
    }

    .form-control {
        border-radius: 5px;
    }

    label {
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Change Name
            </div>
            <div class="card-body">
                <form action="change_name.php" method="POST">
                    <div class="form-group">
                        <label for="new_name">New Name:</label>
                        <input type="text" class="form-control" id="new_name" name="new_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Change Name</button>
                </form>
            </div>
        </div>
    
        <div class="card">
            <div class="card-header">
                Reset Password
            </div>
            <div class="card-body">
                <form id="resetPasswordForm" method="POST">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Add a button for password reset -->

<!-- Script to handle password reset with AJAX -->
<script>
        $(document).ready(function () {
            $('#resetPasswordForm').submit(function (event) {
                event.preventDefault(); // Prevent form submission
                var formData = $(this).serialize(); // Serialize form data
                $.ajax({
                    type: 'POST',
                    url: 'reset_password.php',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        alert(response.message); // Display success message as an alert
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText); // Log any errors to the console
                    }
                });
            });
        });
    </script>

</html>