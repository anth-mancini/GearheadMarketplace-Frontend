<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Gear-Head Market Place </title>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/offerPage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <div class="shadow-lg p-3 mb-5 bg-dark rounded">
        <div class="shadow-lg p-3 mb-2 bg-warning text-dark">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <img tag="item" src="assets/images/blank.png" width="550px" length="550px" class="img-thumbnail" class="rounded" class="img-fluid" alt="...">
                    </div>
                    <div class="col">
                        <p id="p1">TITLE</p>
                        <br>
                        <h2 id="location">LOCATION</h2>
                        <br>
                        <h3 id="desc">
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                            THIS IS A DESCRIPTION
                        </h3>
                        <br>
                        <h3 id="ship">WILLING TO SHIP</h3>
                        <br>
                        <h4 id="price">PRICE</h4>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="shadow-lg p-3 mb-5 bg-dark rounded">
        <div class="w-auto p-3" style="background-color: #0d6efd;">
            <center>
                <button type="button" class="btn btn-warning">Contact Seller</button>
            </center>
        </div>
    </div>
    <form id="addOffer" method="post">
        <button class="btn btn-primary">Get offerings</button>
    </form>

</body>
</html>


<script>
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';

    //$(document).ready(function() {

    //$("form#addOffer").submit(function (e) {
    //$( window ).load(function() {
    $(function () {
        console.log( "ready!" );
        //e.preventDefault();
        fetch(backendURL + 'offers/', {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            console.log(data)
            console.log(data[0])
            renderOffering(data)
        }).catch(error => {
            // console.log(error)
        })
    });

    function renderOffering(data){

        //$("#tag1").attr("src", "https://gearhead-images.s3.amazonaws.com/images/Screen Shot 2021-06-28 at 3.20.56 PM.png")

        $("p#p1").append(data[0].title)
        // $("div#offerings").append('<h2>Description:' + data.description + '</h2>')
        // $("div#offerings").append('<h3>Price:' + data.price + '</h3>')
        // $("div#offerings").append('<h4>Location:' + data.location + '</h4>')
        // $("div#offerings").append('<h5>Willing to ship:' + data['shipping_availability'] + '</h5>')

        for(let img of data.images){
            $("item").attr("src","' + img.link.replace(/\s/g, '+') + '")
        }
    }

</script>