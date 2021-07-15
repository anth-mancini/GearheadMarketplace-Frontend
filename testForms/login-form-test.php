<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Gear-Head Market Place </title>
    <link rel="stylesheet" href="../css/homepage.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>

<form id="loginTry" method="post">
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input class="form-control" type="text" name="email"/>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input class="form-control" type="password" name="password"/>
    </div>
    <button type="submit" class="btn btn-primary">Log in!</button>
</form>
</body>
</html>
<script>
    // let backendURL = 'http://0.0.0.0:8000/';
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    // console.log(backendURL)
    $("form#loginTry").submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this)
        var convertedData = {}
        //building a compatible data object for our post request
        //{key: value, key: value}
        for(let f of formData.entries()) {
            convertedData[f[0]] = f[1]
        }
        // console.log(convertedData);
        $.ajax({
            type: 'post',
            url: backendURL + 'login/',
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