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
</body>
</html>

<script>
$("#someid").on("click", function(){
    console.log("clicked");
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000',
        // url: 'https://backend-gearheadmarketplace.herokuapp.com',
        success: function(data){
            console.log(data);
        }
    })
})
</script>