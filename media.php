<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="GearHead Marketplace social media accounts">

    <title>Social Media</title>
    <style>
        .card {
            border: none;
            padding: 10px 50px;
            background-color: orange;
        }

        h1 {
            text-align: center;
            color: white;
        }

        h2 {
            text-align: center;
        }

        .column {
            float: left;
        }
    </style>
</head>
<?php include_once('header.php'); ?>
<!--background image for page-->
<body style="background-image: url('assets/images/IMG_0024.jpg');
     background-size: cover;
     height: 100vh;
     margin-top: 50px">">
<h1>Social Media</h1>
<!--Social media accounts within card-->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <img width="300"
                     src="assets/images/instagram.png" height="300"/>
                <h2>@GH_Marketplace</h2>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img width="300"
                     src="assets/images/twitter.png" height="300"/>
                <h2>@GHMarketplace</h2>
            </div>
        </div>
    </div>
</div>
</body>
<?php include_once('footer.php'); ?>
</html>