<nav class="nav-bar">
    <div class="hamburger-menu">
        <input type="checkbox" id="menu__toggle" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        <ul class="menu__box">
            <li><a class="menu__item" href="home.php">HOME</a></li>
            <!-- <li><a class="menu__item" href="store.php">Store</a></li>  will be added in the future-->
            <li><a class="menu__item" href="contact-us.php">CONTACT</a></li>


            <li><a class="menu__item" href="ACCOUNT.php">ACCOUNT</a></li>
        <?php if (isset($_SESSION['email'])): ?>
                <li><a class="menu__item" href="logout.php">LOGOUT</a></li>
            <?php else: ?>
                <li><a class="menu__item" href="login.php">LOGIN</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="logo">
        <img class="menu__logo" src="asset/img/LOGO/Aviator-logo.png" alt="Logo" draggable="false" />
    </div>
    <div class="menu__login">
        <a class="menu__item" href="login.php">login</a>
    </div>

</nav>