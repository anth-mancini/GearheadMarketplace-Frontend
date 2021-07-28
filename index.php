<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Home </title>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<?php include_once('header.php'); ?>
<body>
<div class="px-4 py-5 my-6 text-center img-fluid" style="
     background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('/assets/images/IMG_4332.jpeg') fixed center no-repeat;
     background-size: cover;
     height: 100vh;">
    <br>
    <br>
    <br>
    <br>
    <img class="d-block mx-auto mb-4" src="assets/icons/logo_white.png" alt="" width="100" height="100">
    <h1 class="display-5 fw-bold" style="color: white">Gearhead Marketplace</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4" style="color: white">Welcome to GearHead Marketplace, the #1 second-hand automotive store in North America</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="faq.php">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">How to Use the Store</button>
            </a>
            <a href="user_splash.php">
                <button type="button" class="btn btn-danger btn-lg px-4">Browse Listings</button>
            </a>

        </div>
    </div>
</div>
</body>
<?php include_once('footer.php'); ?>

</html>
