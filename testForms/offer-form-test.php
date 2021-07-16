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

<form id="addOffer" method="post">
    <div class="mb-3">
        <label class="form-label">User ID</label>
        <input class="form-control" type="text" name="user_id"/>
        <div class="form-text">This ID actually needs to be supplied via PHP/JQuery</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Title of Offer</label>
        <input class="form-control" type="text" name="title"/>
    </div>
    <div class="mb-3">
        <label class="form-label">Offer Description</label>
        <input class="form-control" type="text" name="description"/>
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input class="form-control" type="text" name="price"/>
        <div class="form-text">Must be a float</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Location</label>
        <input class="form-control" type="text" name="location"/>
    </div>
    <!--    might add this for is avaialbe to ship-->
    <div class="mb-3 form-check">
        <input name="shipping_availability" type="checkbox" class="form-check-input">
        <label class="form-check-label" for="exampleCheck1">Check if you are willing to ship the item</label>
    </div>
    <div class="mb-3">
        <input name="file" class="form-control" type="file"/>
        <div class="form-text">Currently supports only one image</div>
    </div>
    <button class="btn btn-primary">Submit</button>
</form>
</body>
</html>
<script>
    // let backendURL = 'http://0.0.0.0:8000/';
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    $("form#addOffer").submit(function (e) {
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
        for (let f of formData.entries()) {
            console.log(f)
        }
        fetch(backendURL + 'upload_offer/', {
            method: 'POST',
            body: formData,
            enctype: 'multipart/form-data',
            dataType: 'json',
            headers: {
                // 'Content-Type': 'application/json',
                Accept: 'application/json',
            },
            processData: false,
        })
            .then(response => response.json()).then(data => {
            console.log(data)
        }).catch(error => {
            // console.log(error)
        })
    });
</script>