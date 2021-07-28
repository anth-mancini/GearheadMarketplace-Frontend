<?php

if(isset($_POST['offerID'])) {


    $itemID = $_POST['offerID'];
}

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
                        <img id="item" src="assets/images/blank.png" width="550px" length="550px" class="img-thumbnail" class="rounded" class="img-fluid" alt="...">
                    </div>
                    <div class="col">

                        <input type="hidden" id="offerID" name="offerID" value="<?php echo htmlentities($itemID); ?>">

                        <h1 id="title"></h1>
                        <br>
                        <h2 id="location">Location : </h2>
                        <br>
                        <h3 id="desc"></h3>
                        <br>
                        <h4 id="ship">Shipping : </h4>
                        <br>
                        <h5 id="price">Price : </h5>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="shadow-lg p-3 mb-5 bg-dark rounded">
        <div class="w-auto p-3" style="background-color: #0d6efd;">
            <center>
                <button type="button" onclick="mailSeller();"class="btn btn-warning">Contact Seller</button>
                <button type="button" onclick="window.location.href='canadapost_quote.php'" class="btn btn-warning">Shipping Qoute</button>
            </center>
        </div>
    </div>

</body>
</html>


<script>
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';

    let temp  = <?php echo htmlentities($itemID); ?>  ;
    let posterId = "";
    let mailAddress = "";
    console.log(temp);
    //$(document).ready(function() {

    //$("form#addOffer").submit(function (e) {
    //$( window ).load(function() {
    $(function () {
        console.log( "ready!" );
        //e.preventDefault();
        fetch(backendURL + 'offers/' + temp, {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            // console.log(data)
            // console.log(data[0])
            renderOffering(data)
            posterId = data.owner_id;
            console.log(posterId);
        }).catch(error => {
            // console.log(error)
        })
    });
    function mailSeller() {
        console.log( "ready!" );
        //e.preventDefault();
        fetch(backendURL + 'users/' + posterId, {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            // console.log(data)
            // console.log(data[0])
            mailAddress = data.email;
            console.log(mailAddress);
            window.location.href = "mailto:" + mailAddress +"?subject=Gearhead%20Marketplace%20Listing%20Inquiry&body=Type%20message%20here";
        }).catch(error => {
            // console.log(error)
        })
    }

    function renderOffering(data){

        //$("#tag1").attr("src", "https://gearhead-images.s3.amazonaws.com/images/Screen Shot 2021-06-28 at 3.20.56 PM.png")

        $("h1#title").append(data.title)
        $("h2#location").append(data.location)
        $("h3#desc").append(data.description)
        if(data.shipping_availability === true)
        {
            $("h4#ship").append("Yes")
        }
        else{
            $("h4#ship").append("No")
        }

        $("h5#price").append(data.price)
        //$("img#item").attr("src", data.images[0].link)
        //console.log(data.images[0].link)
        document.getElementById("item").src = data.images[0].link;
    }

</script>