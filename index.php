<?php

?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>stuff here</h1>
    <p>trying to push an update. checking</p>
    <button id="someid">Click me!</button>
    <button id="postid">Post data</button>
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
        console.log(JSON.stringify(myData));
        console.log("clicked");
        $.ajax({
            type: 'post',
            url: 'http://0.0.0.0:8000/users/',
            // url: 'https://backend-gearheadmarketplace.herokuapp.com',
            data: JSON.stringify({"email":"someother@gmail.com", "password":"1234566"}),
            dataType: "json",
            success: function(data){
                console.log(data);
            }
        })
    })
</script>