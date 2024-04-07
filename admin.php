<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Aircraft</title>
    <!-- Bootstrap CSS link (Update to the latest version if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="padding: 20px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="font-size: 30px;">Add Aircraft</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="font-size: 25px;">
                <li class="nav-item">
                    <a class="nav-link" href="#sec-1">Add Plane</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sec-2">Cart Data</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <section id="sec-1">
        <h1 class="text-center mt-5">add plane </h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <?php include 'components/add_plane.php'; ?>
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br>
    
    <section id="sec-2" style="display: none;">
    <h1 class="text-center mt-5">client data of the cart</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="width: 90%;">
                <?php include 'components/cart-data-by-user.php'; ?>
            </div>
        </div>
    </div>
</section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Toggle section visibility based on URL hash
            const hash = window.location.hash;
            const sec2 = document.getElementById("sec-2");
            if (hash === "#sec-2") {
                sec2.style.display = "block";
            }
            // Add click event listener to navbar links
            const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
            navLinks.forEach(link => {
                link.addEventListener("click", function(event) {
                    const target = event.target.getAttribute("href");
                    if (target === "#sec-1") {
                        sec2.style.display = "none";
                    } else if (target === "#sec-2") {
                        sec2.style.display = "block";
                    }
                });
            });
        });
    </script>

</body>

</html>
