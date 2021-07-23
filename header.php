<?php
if (!session_id()) @ session_start();
?>
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
                <?php if (!isset($_SESSION['userEmail'])) {
                    echo '<a href="login.php">
                    <button id="btnLogin" class="btn btn-primary">Login</button>
                </a>';
                } else {
                    echo '<div class="clearfix"><ul class="navbar-nav me-auto mb-2 mb-lg-0 float-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./testForms/offer-form-test.php">Create Listing</a></li>
                            <li><a class="dropdown-item" href="./admin.php">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul></div>';
                }
                ?>
            </div>
        </div>
    </nav>
</header>