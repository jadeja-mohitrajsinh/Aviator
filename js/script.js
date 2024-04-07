document.addEventListener("DOMContentLoaded", function () {
        var loginLink = document.querySelector(".menu__login a");

        if (window.location.href.indexOf("login.php") !== -1) {
            loginLink.textContent = "BACK";
            loginLink.href = "index.php";
        }
    
        // Check if the page URL contains "index.php"
        if (window.location.href.indexOf("home.php") !== -1) {
            loginLink.textContent = "CART";
            loginLink.href = "cart.php";
        }
        if (window.location.href.indexOf("cart.php") !== -1) {
            loginLink.textContent = "BACK";
            loginLink.href = "home.php";
        }
           if (window.location.href.indexOf("cart.php") !== -1) {
            loginLink.textContent = "HOME";
            loginLink.href = "home.php";
        }
    

    const container = document.querySelector(".container");

    container.addEventListener("click", function (event) {
        const target = event.target;

        if (target.id === "sign-up-btn") {
            container.classList.add("sign-up-mode");
        } else if (target.id === "sign-in-btn") {
            container.classList.remove("sign-up-mode");
        }
    });
    

});




