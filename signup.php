<?php

?>

<html>
<head>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="css/log.css">
</head>
<?php include_once('header.php'); ?>
<body style="background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('/assets/images/IMG_1626.jpeg') fixed center no-repeat;
     background-size: cover;">
<div class="d-flex justify-content-center h-100">
    <div class="card">
        <div class="card-header">
            <div style="text-align: center;"><h3>Sign Up</h3></div>
        </div>
        <div class="card-body">
            <form id="addUser" method="post">
                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input class="form-control" type="text" required pattern="[a-zA-Z0-9.-_]{1,}" oninvalid="this.setCustomValidity('Has to be more than 1 character')" oninput="this.setCustomValidity('')" name="user_name"/>
                    <div class="form-text">MUST HAVE A VALUE</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="text" required pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[com]{2,}" oninvalid="this.setCustomValidity('must be in email format with a @ and .com')"
                           oninput="this.setCustomValidity('')"  name="email"/>
                    <div class="form-text">MUST HAVE A VALUE</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" required pattern="(?=.*[!@#$%^&*()_+\-=\[\]{};':\\|,.<>\/?])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninvalid="this.setCustomValidity('must be atleast 8 chars with atleast 1 upercase 1 lowercase 1 number and 1 special char')"name="password"/>
                    <div class="form-text">MUST HAVE A VALUE</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
<?php include_once('footer.php'); ?>
</html>
<script>
    // let backendURL = 'http://0.0.0.0:8000/';
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    console.log(backendURL)
    $("form#addUser").submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this)
        var convertedData = {}
        //building a compatible data object for our post request
        //{key: value, key: value}
        for(let f of formData.entries()) {
            convertedData[f[0]] = f[1]
        }
        $.ajax({
            type: 'post',
            url: backendURL + 'users/',
            // url: 'https://backend-gearheadmarketplace.herokuapp.com',
            data: JSON.stringify(convertedData),
            dataType: "json",
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
            },
            success: function (data) {
                console.log(data);
            }
        })
    })
</script>