<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Home </title>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
<nav class="navbar fixed-top navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">GearHead MarketPlace    |</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">What We Do</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Login
                    </a>
                </li>

            </ul>
        </div>
    </div>

</nav>




<header>
    <div class="wrapper">
        <div class="logo">
            <img src="assets/images/logo.JPG" alt="">
        </div>

    </div>

    <div class="welcome-text">
        <h1>Gear-Head Market Place</h1>
        <a href="#">Contact Us</a>
    </div>
</header>



<!--FOOTER-->
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h2 class="logo-text"><span>GearHead</span>MarketPlace</h2>
            <p>
                GearHead MarketPlace is a user friendly interface capable of
                connecting clients within North America to fufill their automotive
                needs.
            </p>
        </div>
        <div class="footer-section links">
            <h2>Quick Links</h2>
            <br>
            <ul>
                <a href="#">
                    <li>About</li>
                </a>
                <a href="#">
                    <li>What We Do</li>
                </a>
                <a href="#">
                    <li>Contact Us</li>
                </a>
                <a href="#">
                    <li>Login</li>
                </a>

            </ul>
        </div>
        <div class="footer-section contact">
            <h2>Contact Us</h2>
            <br>
            <form action="index.php" method="post"
                <input type="email" name="email" class="#" placeholder="Your email address..">
                <textarea name="message" class="#" placeholder="Your message.."></textarea>
            </form>

        </div>
    </div>
    <div class="footer-bottom">
        &copy; gearheadmarketplace.com | Designed by: Team 7
    </div>
</div>

</body>
</html>