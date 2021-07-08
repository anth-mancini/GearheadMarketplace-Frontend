<?php

?>
<html>
<head>
    <script src="../js/jquery-3.6.0.min.js"></script>
</head>
<body>
<h1>hello world</h1>
<p>trying to push an update. checking</p>
<button id="someid">Click me!</button>
<button id="postid">Post data</button>
<form id="addOffer" method="post">
    <input type="text" name="user" value="User Name"/>
    <input type="text" name="title" value="Offer Title"/>
    <input type="text" name="description" value="Offer description"/>
    <input type="text" name="price" value="Offer price"/>
    <input type="text" name="location" value="Offer location"/>
    <input name="file" type="file"/>
    <button>Submit</button>
</form>
<!--<form id="data" method="post">-->
<!--    <input type="text" name="bucket" value="gearhead-images"/>-->
<!--    <input type="text" name="folder" value="images"/>-->
<!--    <input name="file" type="file"/>-->
<!--    <button>Submit</button>-->
<!--</form>-->
</body>
</html>
<!--{-->
<!--"title": "string",-->
<!--"description": "string",-->
<!--"price": 0,-->
<!--"location": "string",-->
<!--"shipping_availability": true-->
<!--}-->

<script>
    let myData = {email: "someemail@gmail.com", password: "123456"};
    $("#someid").on("click", function () {
        console.log("clicked");
        $.ajax({
            type: 'GET',
            //url: 'http://0.0.0.0:8000/users/?skip=0&limit=100',
            url: 'https://backend-gearheadmarketplace.herokuapp.com/users/?skip=0&limit=100',
            success: function (data) {
                console.log(data);
            }
        })
    })

    $("#postid").on("click", function () {
        console.log(JSON.stringify(myData));
        console.log("clicked");
        $.ajax({
            type: 'post',
            url: 'http://0.0.0.0:8000/users/',
            // url: 'https://backend-gearheadmarketplace.herokuapp.com',
            data: JSON.stringify({"email": "someother@gmail.com", "password": "1234566"}),
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
    $("form#data").submit(function (e) {
        e.preventDefault();
        // IMPORTANT the names (name="") of the form fields must match the backend.
        // Review the expected names by visiting the backendURL/docs
        let fromData = new FormData(this)
        fetch('http://0.0.0.0:8000/uploadfile', {
            method: 'POST',
            body: fromData,
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
    $("form#addOffer").submit(function (e) {
        e.preventDefault();
        // IMPORTANT the names (name="") of the form fields must match the backend.
        // Review the expected names by visiting the backendURL/docs
        let fromData = new FormData(this)
        fetch('http://0.0.0.0:8000/uploadfile', {
            method: 'POST',
            body: fromData,
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