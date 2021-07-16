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
    <button class="btn btn-primary">Get offerings</button>
</form>
<div id="offerings">
</div>
</body>
</html>
<script>
    // let backendURL = 'http://0.0.0.0:8000/';
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    $("form#addOffer").submit(function (e) {
        e.preventDefault();
        fetch(backendURL + 'offers/', {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            console.log(data)
            console.log(data[0])
            renderOffering(data[0])
        }).catch(error => {
            // console.log(error)
        })
    });
    function renderOffering(data){
        $("div#offerings").append('<h1>Title:' + data.title + '</h1>')
        $("div#offerings").append('<h2>Description:' + data.description + '</h2>')
        $("div#offerings").append('<h3>Price:' + data.price + '</h3>')
        $("div#offerings").append('<h4>Location:' + data.location + '</h4>')
        $("div#offerings").append('<h5>Willing to ship:' + data['shipping_availability'] + '</h5>')

        for(let img of data.images){
            console.log(img.link.replace(/\s/g, '+'))
            $("div#offerings").append('<img width = "400px" height="400px" src="' + img.link.replace(/\s/g, '+') + '">')
        }
    }
</script>