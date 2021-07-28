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
            <button class="btn btn-primary" onclick="changeFormVis()">Show/Hide Form</button>
            <form id="editUser" style="display: none" method="post">
                <div class="mb-3">
                    <label class="form-label">User ID</label>
                    <input id="userID" class="form-control" type="text" readonly name="id"/>
                </div>
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
                <div class="mb-3 form-check">
                    <input id="isAdmin" name="isAdmin" type="checkbox" class="form-check-input">
                    <label class="form-check-label" for="exampleCheck1">Check if you'd like user to be admin</label>
                </div>
                <button class="btn btn-primary">Submit Change</button>
            </form>
            <div id="offerEdit"></div>
            <!--    Stuff goes here        -->
            <table id="adminUserView" class="table table-sm">
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
        $(document).on("click", "a.edit", function (event) {
            // $(this).parent().remove();
            // console.log(event.target.id)
            editUser(event.target.id);
        });
        $(document).on("click", "a.remove", function (event) {
            // $(this).parent().remove();
            // console.log(event.target.id)
            removeUser(event.target.id);
        });
    });

    function changeFormVis() {
        $("#editUser").toggle();
    }

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
            tableHTML += "<td>" + "<a id=" + data[k].id + " href='javascript:void(0);' class='edit'>Edit</a>" + "/";
            tableHTML += "<a id=" + data[k].id + " href='javascript:void(0);' class='remove'>Remove</a>" + "</td>";
            tableHTML += "</tr>"
        }
        $('#adminUserView tbody').html(tableHTML);
    }

    function editUser(id) {
        $("#editUser").show();
        fetch(backendURL + 'users/' + id, {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            populateForm(data);
        }).catch(error => {

        })
    }

    $("form#editUser").submit(function (e) {
        // e.preventDefault();
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
        $.ajax({
            type: 'post',
            url: backendURL + 'users/' + id,
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

    function populateForm(data) {
        $("#userID").val(data.id);
        $("#userName").val(data.user_name);
        $("#userFirstName").val(data.first_name);
        $("#userLastName").val(data.last_name);
        $("#userEmail").val(data.email);
        $("#isAdmin").prop('checked', data['isAdmin']);
    }

    function removeUser(id) {
        // removing the ability to click it again
        $("#" + id + ".remove").html('deleting...');
        $("#" + id + ".remove").removeAttr('href');

        //calling the delete method with the provided id in the back end
        fetch(backendURL + 'users/' + id, {
            method: 'delete',
        })
            .then(response => response.json()).then(data => {
            //alerting the user and reloading the page.
            //ideally, we'd just reload the area but required a bit more effort...
            alert(data);
            location.reload();
        }).catch(error => {

        })
    }
</script>
</body>
</html>
