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
    <img class="d-block mx-auto mb-4" src="assets/images/logo1.png" alt="" width="200" height="100">
    <h1 class="display-5 fw-bold" style="color: white">Gearhead Marketplace</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4" style="color: white">We are the best company in the world</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
            <button type="button" class="btn btn-danger btn-lg px-4">Secondary</button>
        </div>
    </div>
</div>
</body>
<?php include_once('footer.php'); ?>

</html>