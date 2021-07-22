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
                        <a class="nav-link " aria-current="page" href="useraccount.php">
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
                        <a class="nav-link active" href="listings.php">
                            <span data-feather="users"></span>
                            Listings
                        </a>
                    </button>
                </ul>
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Listings</h1>
            </div>
            <button class="btn btn-primary" onclick="changeFormVis()">Show/Hide Form</button>
            <form id="editOffer" style="display: none" method="post">
                <div class="mb-3">
                    <label class="form-label">Offer ID</label>
                    <input id="offerID" class="form-control" type="text" name="user_id"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Title of Offer</label>
                    <input id="offerTitle" class="form-control" type="text" name="title"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Offer Description</label>
                    <input id="offerDes" class="form-control" type="text" name="description"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input id="offerPrice" class="form-control" type="text" name="price"/>
                    <div class="form-text">Must be a float</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input id="offerLoc" class="form-control" type="text" name="location"/>
                </div>
                <!--    might add this for is avaialbe to ship-->
                <div class="mb-3 form-check">
                    <input name="shipping_availability" type="checkbox" class="form-check-input">
                    <label class="form-check-label" for="exampleCheck1">Check if you are willing to ship the
                        item</label>
                </div>
                <div class="mb-3">
                    <input name="file" class="form-control" type="file"/>
                    <div class="form-text">Currently supports only one image</div>
                </div>
                <button class="btn btn-primary">Submit Change</button>
            </form>
            <!--    Stuff goes here        -->
            <table id="adminOfferView" class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">Offer ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </main>
    </div>
</div>
</body>

</html>

<script>
    let backendURL = 'http://0.0.0.0:8000/';
    // let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    $(function () {
        fetch(backendURL + 'offers/', {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            renderTable(data);
        }).catch(error => {
            // console.log(error)
        })
        $(document).on("click", "a.edit", function (event) {
            // $(this).parent().remove();
            // console.log(event.target.id)
            editListing(event.target.id);
        });
    });

    function renderTable(data) {
        // ID, User, Title, Edit/Remove
        // console.log(data);
        let tableHTML = "";
        for (let k = 0; k < data.length; k++) {
            tableHTML += "<tr>";
            tableHTML += "<td>" + data[k].id + "</td>"
            tableHTML += "<td>" + data[k].owner_id + "</td>"
            tableHTML += "<td>" + data[k].title + "</td>"
            tableHTML += "<td>" + "<a id=" + data[k].id + " href='javascript:void(0);' class='edit'>Edit</a>/Remove" + "</td>"
            tableHTML += "</tr>"
        }
        $('#adminOfferView tbody').html(tableHTML);
    }

    function editListing(id) {
        $("#editOffer").show();
        fetch(backendURL + 'offers/' + id, {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            populateForm(data);
        }).catch(error => {

        })
    }

    function populateForm(data) {
        $("#offerID").val(data.id);
        $("#offerTitle").val(data.title);
        $("#offerDes").val(data.description);
        $("#offerPrice").val(data.price);
        $("#offerLoc").val(data.location);
    }

    function changeFormVis() {
        $("#editOffer").toggle();
    }

    $("form#editOffer").submit(function (e) {
        e.preventDefault();
        $("#editOffer").hide();
        $("#offerID").val("");
        $("#offerTitle").val("");
        $("#offerDes").val("");
        $("#offerPrice").val("");
        $("#offerLoc").val("");
    })
</script>