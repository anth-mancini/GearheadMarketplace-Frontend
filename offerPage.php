<?php

//get offerID from posted form
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

                        <!--hidden form  to get item id and hold it-->
                        <input type="hidden" id="offerID" name="offerID" value="<?php echo htmlentities($itemID); ?>">

                        <!--Setup where data will load to-->
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

    <!--cool box to hold button-->
    <div class="shadow-lg p-3 mb-5 bg-dark rounded">
        <!--mail button-->
        <div class="w-auto p-3" style="background-color: #0d6efd;">
            <center>
                <button type="button" onclick="mailSeller();"class="btn btn-warning">Contact Seller</button>
                <button type="button" onclick="window.location.href='canadapost_quote.php'" class="btn btn-warning">Shipping Quote</button>
            </center>
        </div>
    </div>

</body>
</html>


<script>
    //connect to backend
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';

    //some variables
    let temp  = <?php echo htmlentities($itemID); ?>  ;
    let posterId = "";
    let mailAddress = "";
    let offerName = "";
    console.log(temp);

    //on open load the  offers data from database
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
            offerName = data.title;
            console.log(posterId);
        }).catch(error => {
            // console.log(error)
        })
    });
    //if mail button is  clicked
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
            //open mail app with seller info
            window.location.href = "mailto:" + mailAddress +"?subject=Gearhead%20Marketplace%20Listing%20Inquiry%20-%20" + offerName +"&body=Type%20message%20here";
        }).catch(error => {
            // console.log(error)
        })
    }

    //loads the offereing into html
    function renderOffering(data){

        //takes data stored in data and pulls all info
        //places using tags
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
        document.getElementById("item").src = data.images[0].link;
    }

</script>