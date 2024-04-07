<?php 
session_start();    
require 'vendor/autoload.php';
include 'database/dbcon.php';
include 'components/Nav-Bar.php';
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" media="screen" href="css/styles.css" />
    <link rel="stylesheet" media="screen" href="css/Nav-Bar.css" />
    <link rel="stylesheet" href="css/font.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/search.css" />
    <link rel="stylesheet" href="css/store.css"/>
    <script src="contact-script.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="js/script.js"></script>
    <style>
    </style>
</head>
<body>
  
<div class="search-container">
                <form action="home.php" method="get">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit"><i class="fas fa-search"></i></button>
    </div>
            </form>
        </div>
    </div>
<div class="product">
<div class="container margin-top-50">
  <div class="row">
    <div class="col-sm">
      <div class="card">
        <img src="asset\img\MAIN\cro_20190726_064_50_370x230@2x.webp" class="card-img-top" alt="Product Image">
        <div class="card-body">
          <h5 class="card-title">efgrt</h5>
          <p class="card-text">fervbtnb</p>
        </div>
        <div class="card-footer">
          <p class="card-text">Price: $100</p>
          <a href="#" class="btn btn-primary">CART</a>
        </div>
      </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

</body>
</html>