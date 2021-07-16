
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Home </title>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
</head>
    <link rel="stylesheet" href="css/header.css">
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Gearhead Market Place</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="mission.php">Our Mission</a></li>
                            <li><a class="dropdown-item" href="team.php">Our Team</a></li>
                            <li><a class="dropdown-item" href="service.php">Our Services</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="media.php">Social Media</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">What we do</a>
                    </li>
                </ul>
                <a href="login.php">
                    <button class="btn btn-primary">Login</button>
                </a>
            </div>
        </div>
    </nav>
</header>
<body>
<div class="px-4 py-5 my-6 text-center"
     style="height: 100vh;
     background-size: cover;
     background-repeat: no-repeat;
      background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('/assets/images/IMG_4332.jpeg')">
    <img class="d-block mx-auto mb-4" src="assets/images/logo1.png" alt="" width="200" height="100">
    <h1 class="display-5 fw-bold" style="color: white">Gearhead Marketplace</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4" style="color: white">We are the best company in the world</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="admin.php">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
            </a>
            <button type="button" class="btn btn-danger btn-lg px-4">Secondary</button>
        </div>
    </div>
</div>
<?php include_once('user_splash.php'); ?>
</body>
<link rel="stylesheet" href="css/footer.css">
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Gearhead Marketplace</h1>
                GearHead MarketPlace is a user friendly interface capable of
                connecting clients within North America to fufill their automotive
                needs.
            </div>
            <div class="col-sm">
                <h2>Quick Links</h2>
                <br>
                <ul>
                    <a href="dashboard.php">
                        <li>Login</li>
                    </a>
                    <a href="mission.php">
                        <li>Mission</li>
                    </a>
                    <a href="service.php">
                        <li>Services</li>
                    </a>
                    <a href="team.php">
                        <li>Team</li>
                    </a>
                    <a href="media.php">
                        <li>Social Media</li>
                    </a>
                </ul>
            </div>
            <div class="col-sm">
                <h2>Contact Us</h2>
                <br>
                <form action="index.php" method="post"
                <input type="email" name="email" class="#" placeholder="Your email address..">
                <textarea name="message" class="#" placeholder="Your message.."></textarea>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; gearheadmarketplace.com | Designed by: Team 7
    </div>
</div></html>
