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
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>

<?php include_once('header.php') ?>
<div class="container-fluid" style="padding-top: 60px">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <button class="nav-item" , id="button1">
                        <a class="nav-link " aria-current="page" href="admin.php">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </button>
                    <button class="nav-item" , id="button2">
                        <a class="nav-link active" aria-current="page" href="useraccount.php">
                            <span data-feather="file"></span>
                            User Account
                        </a>
                    </button>
                    <button class="nav-item" , id="button3">
                        <a class="nav-link" href="themes.php">
                            <span data-feather="shopping-cart"></span>
                            Themes
                        </a>
                    </button>
                    <button class="nav-item" , id="button4">
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
            <div id="offerEdit"></div>
            <!--    Stuff goes here        -->
            <table id="adminOfferView" class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                    <th scope="col"># of Offers</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </main>
    </div>
</div>

<script type="text/javascript">
    // let backendURL = 'http://0.0.0.0:8000/';
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    $(function () {
        fetch(backendURL + 'users/', {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            renderTable(data);
        }).catch(error => {

        })
    });

    function renderTable(data) {
        // ID, User, Title, Edit/Remove
        // console.log(data);
        let tableHTML = "";
        for (let k = 0; k < data.length; k++) {
            tableHTML += "<tr>";
            tableHTML += "<td>" + data[k].id + "</td>"
            tableHTML += "<td>" + data[k].email + "</td>"
            tableHTML += "<td>" + data[k].isAdmin + "</td>"
            tableHTML += "<td>" + data[k].offers.length + "</td>"
            tableHTML += "<td>" + "Edit" + "/Remove" + "</td>"
            tableHTML += "</tr>"
        }
        $('#adminOfferView tbody').html(tableHTML);
    }


</script>
</body>
</html>
