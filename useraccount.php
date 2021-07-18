<?php

?>
<?php

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Gearhead MarketPlace</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <button class="nav-item", id="button1">
                        <a class="nav-link " aria-current="page" href="admin.php">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </button>
                    <button class ="nav-item", id="button2">
                        <a class="nav-link active" aria-current="page" href="useraccount.php">
                            <span data-feather="file"></span>
                            User Account
                        </a>
                    </button>
                    <button class="nav-item", id="button3">
                        <a class="nav-link" href="themes.php">
                            <span data-feather="shopping-cart"></span>
                            Themes
                        </a>
                    </button>
                    <button class="nav-item", id="button4">
                        <a class="nav-link" href="listings.php">
                            <span data-feather="users"></span>
                            Listings
                        </a>
                    </button>
                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">User Account</h1>
            </div>


    </div>
    </main>
</div>
</div>

<script type="text/javascript">
    $(document).on('click','ul li', function (){
        $(this).addClass('nav-item').siblings().removeClass('nav-item')
    })
</script>
</body>
</html>
