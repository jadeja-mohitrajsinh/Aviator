document.addEventListener("DOMContentLoaded", function () {
    // Get the loginLink element
    var loginLink = document.querySelector(".menu__login a");

    // Check if the page URL contains "login.php"
    if (window.location.href.indexOf("login.php") !== -1) {
        // If it is the login page, update the link to go back
        loginLink.textContent = "Back";
        loginLink.href = "index.php"; // Update the href to the desired back link URL
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
