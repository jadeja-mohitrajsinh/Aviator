<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" media="screen" href="css/Nav-Bar.css">
    <link rel="stylesheet" media="screen" href="css/style-login.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
    </style>
</head>
<?php
  include 'components/Nav-Bar.php';
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="auth-signIn-post.php" class="sign-in-form" method="post" id="signInForm">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <!-- // username--login -->
                        <input type="email" placeholder="Email" id="signInEmail" name="signInEmail" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <!-- // password--login -->
                        <input type="password" placeholder="Password" id="signInPassword" name="signInPassword" />
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="Submit-SignIn" class="btn btn-primary">Login</button>
                    </div>
                </form>


                <form action="auth-signUp-post.php" class="sign-up-form" method="post">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <!-- // username--signup -->
                        <input name="signUpUsername" type="name" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <!-- // email--signup -->
                        <input name="signUpUserEmail" type="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <!-- // password--signup -->
                        <input name="signUpUserPassword" type="password" placeholder="Password" />
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="Submit-SignUp" class="btn btn-primary">Register</button>
                    </div>
                </form>


            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Join us and create an account to get started. Explore a world
                        of possibilities with our jets.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Sign in to access your account. We're excited to have you back!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
if (isset($_SESSION['error'])) {
    echo '<script>alert("' . $_SESSION['error'] . '");</script>';
    unset($_SESSION['error']);
}
?>

</html>