<?php
if (!session_id()) @ session_start();
// if user is not allowed on this page, kick them out.

if (empty($_SESSION['isAdmin']) || !isset($_SESSION['isAdmin'])) {
    echo "<script> window.location.replace('/'); alert('Not logged in');</script>";
}
//if (empty($_SESSION['isAdmin']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === false) {
//    echo "<script> window.location.replace('/'); alert('Only Admins are allowed on this page');</script>";
//}
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
<?php include_once('header.php') ?>
<body>
<div class="container-fluid" style="padding-top: 60px">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <button class="nav-item" id="myAccount">
                        <a id="myAccountSelected" class="nav-link active">
                            My Account
                        </a>
                    </button>
                    <button class="nav-item" id="myListings">
                        <a id="myListingsSelected" class="nav-link">
                            My Listings
                        </a>
                    </button>
                </ul>
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2" id="myTitle">Account Information</h1>
            </div>
            <form id="editOffer" style="display: none" method="post">
                <div class="mb-3">
                    <label class="form-label">Offer ID</label>
                    <input id="offerID" class="form-control" type="text" readonly name="offer_id"/>
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
                    <input id="shippingCheck" name="shipping_availability" type="checkbox" class="form-check-input">
                    <label class="form-check-label" for="exampleCheck1">Check if you are willing to ship the
                        item</label>
                </div>
                <div class="mb-3">
                    <input name="file" class="form-control" type="file"/>
                    <div class="form-text">Currently supports only one image</div>
                </div>
                <button class="btn btn-primary">Submit Change</button>
            </form>
            <form id="editUser" style="display: none" method="post">
                <p>The data below reflect the most current information</p>
                <p>make the changes you'd like to update your user data</p>
                <p>then click on submit change and wait for a confirmation!</p>
                <input id="userID" class="form-control" type="text" disabled hidden name="id"/>
                <input id="isAdmin" name="isAdmin" type="checkbox" disabled hidden class="form-check-input">
                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input id="userName" class="form-control" type="text" name="user_name"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">User Email</label>
                    <input id="userEmail" class="form-control" type="text" name="email"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input id="userFirstName" class="form-control" type="text" name="first_name"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input id="userLastName" class="form-control" type="text" name="last_name"/>
                </div>
                <!--  TODO: add password setting function              -->
                <!--                <div class="mb-3">-->
                <!--                    <label class="form-label">Password</label>-->
                <!--                    <input id="userPassword" class="form-control" type="text" name="password"/>-->
                <!--                </div>-->
                <button class="btn btn-primary">Submit Change</button>
            </form>
            <div id="myTarget">

            </div>
        </main>
    </div>
</div>
</body>
</html>

<script>
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    let tableHTML = '<table id="userListingView" class="table table-sm"><thead><tr><th scope="col">Offer ID</th><th scope="col">Title</th><th scope="col">Action</th></tr></thead><tbody></tbody></table>';
    let userID = <?php echo $_SESSION['userID'];?>;
    $(function () {
        'use strict';
        // alert(userID)
        // Handler for .ready() called.
        renderMyAccount();
        $("#myAccount").click(function () {
            renderMyAccount();
        });
        $("#myListings").click(function () {
            renderMyListings();
        });
        $(document).on("click", "a.edit", function (event) {
            // $(this).parent().remove();
            // console.log(event.target.id)
            editListing(event.target.id);
        });
        $(document).on("click", "a.remove", function (event) {
            // $(this).parent().remove();
            // console.log(event.target.id)
            removeListing(event.target.id);
        });
    });

    function renderMyAccount() {
        $("#myTitle").html('Account Information');
        $("#myTarget").html('Loading...')
        fetch(backendURL + 'users/' + userID, {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            $("#myAccountSelected").addClass('active');
            $("#myListingsSelected").removeClass('active');
            $("#myTarget").html('')
            $("#editUser").show();
            $("#editOffer").hide();
            populateForm(data);
        }).catch(error => {
            console.log(error);
        })
    }

    function renderMyListings() {
        $("#myAccountSelected").removeClass('active');
        $("#myListingsSelected").addClass('active');
        $("#editUser").hide();
        $("#editOffer").hide();
        $("#myTitle").html('My Listings');
        $("#myTarget").html(tableHTML)
        $('#userListingView tbody').html('Loading...');
        fetch(backendURL + 'users/' + userID + "/offers", {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            renderOfferTable(data)
        }).catch(error => {
            console.log(error);
        })
    }

    function renderOfferTable(data) {
        // ID, User, Title, Edit/Remove
        // console.log(data);
        let tableHTML = "";
        if (data.length === 0) {
            tableHTML = "No listings... go make some!"
        }
        for (let k = 0; k < data.length; k++) {
            tableHTML += "<tr>";
            tableHTML += "<td>" + data[k].id + "</td>"
            tableHTML += "<td>" + data[k].title + "</td>"
            tableHTML += "<td>" + "<a id=" + data[k].id + " href='javascript:void(0);' class='edit'>Edit</a>" + "/";
            tableHTML += "<a id=" + data[k].id + " href='javascript:void(0);' class='remove'>Remove</a>" + "</td>";
            tableHTML += "</tr>"
        }
        $('#userListingView tbody').html(tableHTML);
    }

    function populateForm(data) {
        $("#userID").val(data.id);
        $("#userName").val(data.user_name);
        $("#userFirstName").val(data.first_name);
        $("#userLastName").val(data.last_name);
        $("#userEmail").val(data.email);
        $("#isAdmin").prop('checked', data['isAdmin']);
    }

    function removeListing(id) {
        // $("#editOffer").show();
        fetch(backendURL + 'offers/' + id, {
            method: 'delete',
        })
            .then(response => response.json()).then(data => {
            console.log(data);
            // populateForm(data);
        }).catch(error => {

        })
    }

    function editListing(id) {
        $("#editOffer").show();
        fetch(backendURL + 'offers/' + id, {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            // console.log(data);
            populateListingForm(data);
        }).catch(error => {

        })
    }

    $("form#editOffer").submit(function (e) {
        e.preventDefault();
        // IMPORTANT the names (name="") of the form fields must match the backend.
        // Review the expected names by visiting the backendURL/docs
        let formData = new FormData(this)
        let shippingFlag = true;
        for (let f of formData.entries()) {
            if (f[0] === 'shipping_availability') {
                shippingFlag = false;
            }
        }
        formData.set('shipping_availability', 'true')
        if (shippingFlag) {
            formData.set('shipping_availability', 'false')
        }
        // for (let f of formData.entries()) {
        //     console.log(f)
        // }
        fetch(backendURL + 'offers/' + formData.get('offer_id'), {
            method: 'post',
            body: formData,
            enctype: 'multipart/form-data',
            dataType: 'json',
            headers: {
                Accept: 'application/json',
            },
            processData: false,
        })
            .then(response => response.json()).then(data => {
            alert(JSON.stringify(data))
            $("#editOffer").hide();
            $("#offerID").val("");
            $("#offerTitle").val("");
            r
            $("#offerDes").val("");
            $("#offerPrice").val("");
            $("#offerLoc").val("");
            $("#shippingCheck").prop('checked', false);
        }).catch(error => {
            // console.log(error)
        })
    });

    function populateListingForm(data) {
        $("#offerID").val(data.id);
        $("#offerTitle").val(data.title);
        $("#offerDes").val(data.description);
        $("#offerPrice").val(data.price);
        $("#offerLoc").val(data.location);
        $("#shippingCheck").prop('checked', data['shipping_availability']);
    }

    $("form#editUser").submit(function (e) {
        e.preventDefault();
        // IMPORTANT the names (name="") of the form fields must match the backend.
        // Review the expected names by visiting the backendURL/docs
        let formData = new FormData(this)
        let adminFlag = true;
        for (let f of formData.entries()) {
            if (f[0] === 'isAdmin') {
                adminFlag = false;
            }
        }
        formData.set('isAdmin', true)
        if (adminFlag) {
            formData.set('isAdmin', false)
        }
        let id = formData.get('id');
        formData.delete('id');
        let convertedData = {}
        //building a compatible data object for our post request
        //{key: value, key: value}
        for (let f of formData.entries()) {
            convertedData[f[0]] = f[1]
        }
        console.log(convertedData);
        $.ajax({
            type: 'post',
            url: backendURL + 'users/' + <?php echo $_SESSION['userID'];?>,
            data: JSON.stringify(convertedData),
            dataType: "json",
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
            },
            success: function (data) {
                //alerting the user and reloading the page.
                //ideally, we'd just reload the area but required a bit more effort...
                alert(JSON.stringify(data))
                location.reload();

                // not needed since we're reloading the page to reflect most
                // up to date info
                // $("#editUser").hide();
                // $("#offerID").val("");
                // $("#offerTitle").val("");
                // $("#offerDes").val("");
                // $("#offerPrice").val("");
                // $("#offerLoc").val("");
                // $("#shippingCheck").prop('checked', false);
            }
        })
    });
</script>
