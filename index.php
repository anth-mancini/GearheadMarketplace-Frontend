<?php

?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <h1>stuff here</h1>
    <p>trying to push an update.</p>
    <button id="someid" type="button" class="btn btn-primary">Get</button>
    <button id="postid" type="button" class="btn btn-primary">Post</button>
</body>
</html>

<script>
    let myData = {email: "someemail@gmail.com", password: "123456"};
    $("#someid").on("click", function(){
        console.log("clicked");
        $.ajax({
            type: 'GET',
            //url: 'http://0.0.0.0:8000/users/?skip=0&limit=100',
            url: 'https://backend-gearheadmarketplace.herokuapp.com/users/?skip=0&limit=100',
            success: function(data){
                console.log(data);
            }
        })
    })

    $("#postid").on("click", function(){
        // console.log(JSON.stringify(myData));
        // console.log("clicked");
        $.ajax({
            type: 'post',
            url: 'http://0.0.0.0:8000/users/',
            // url: 'https://backend-gearheadmarketplace.herokuapp.com',
            data: JSON.stringify(myData),
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
            },
            success: function(data){
                console.log(data);
            },
            error: function(data){
                console.log(data.responseJSON.detail);
            }   
        })
    })
</script>