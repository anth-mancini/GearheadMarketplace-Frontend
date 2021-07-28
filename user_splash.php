<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GearHead Marketplace</title>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="css/user_splash.css">
</head>
<?php include_once('header.php'); ?>
<body>
<div id="offerings" class="container d-flex align-items-center justify-content-center text-center h-100"
     style="height: 100vh">
</div>
<form id="toOffer" name ="toOffer" action="offerPage.php" method="post">
    <input type="hidden" id="offerID" name="offerID" value="">
</form>

</body>
<?php include_once('footer.php'); ?>
</html>
<script>
    // let backendURL = 'http://0.0.0.0:8000/';
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    $(function () {
        // Handler for .ready() called.
        fetch(backendURL + 'offers/', {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            console.log(data);
            renderOffering(data, 12);
        }).catch(error => {
            console.log(error);
        })
    });
    $("button#page1").click(function (e) {
        e.preventDefault();
    });

    $(document).on("click", "img.offering", function (event) {
        //$(this).parent().remove();
        //console.log(event.target.id)
        openOffer(event.target.id);
        alert(event.target.id);
        //console.log(event.target.id);
        //alert(event.target);
    });


    function openOffer(id) {
        document.getElementById("offerID").value = id;
        //alert(id);
        document.getElementById("toOffer").submit();
        //window.open("http://localhost:8888/offerPage.php");
    }

    /// Render offering
    // This code needs to be expanded to support pagintion (pages)
    // or scrolling to view more listings and clicking on listings to view them
    // Renders the first x listings in the data set.
    // If max is set to 12, then it will be the first 12.
    // There is some logic to lay out listings "nicely"
    // For example, if we have only 3 listings, then we would render only one row
    // if we have >6 listings than we'd render two
    function renderOffering(data, max) {
        // Max 6 listings in a row
        // x | x | x | x | x | x
        let maxCols = 6;
        let range = max; // set the range to max

        //if we have less offerings than our max, then set our range to that
        if (data.length < max)
            range = data.length;

        // get the number of rows we're going to need
        let numRows = Math.ceil(range / maxCols);

        // tracker to make sure we don't go over the actual number of offerings
        // can overshoot with current row/col logic
        let offerCount = 0;

        //Our final HTML grid to be added to some div later
        let buildGrid = '';
        for (let j = 0; j < numRows; j++) {

            //open a new row
            buildGrid += '<div id="row' + (j + 1) + '" class="row" style="background: darkorange;">'
            for (let k = 0; k < maxCols; k++) {
                // if we havent rendered our range, add more offerings
                if (offerCount < range) {
                    // open a new col
                    let divPortion = '<div class="col" style="">';

                    // (legacy) blank image
                    // let imgPortion = '<img id=' + '"tag' + (offerCount + 1) + '" height="200" width="200" src="assets/images/blank.png" onclick="">';
                    let imgPortion = "";
                    // Add image from database to an img tag
                    if (data[offerCount].images.length > 0) {
                        // imgPortion = '<img id=' + '"tag' + (offerCount + 1) + '" height="200" width="200" src="' +
                        //     data[offerCount].images[0].link.replace(/\s/g, '+') + '" onclick="openOffer(data,offerCount)"  >';
                        imgPortion = '<img class="offering" id=' + '"' + data.offer_id + '" height="200" width="200" src="' +
                            data[offerCount].images[0].link.replace(/\s/g, '+') + '" >';
                    }

                    // document.getElementById('offerID').submit(); "

                    // add a p tag with the offering title
                    let paraPortion = '<p id="p' + (offerCount + 1) + '">' + data[offerCount].title + '</p>';
                    let closingDivTag = '</div>'; // close out the column
                    // add all tags to the overall grid
                    buildGrid += divPortion + imgPortion + paraPortion + closingDivTag;
                    offerCount++;
                } else {
                    // if we've reached our limit then we can put our loops out of range and move on
                    k = maxCols;
                    j = numRows;
                }
            }
            // close out the row
            buildGrid += '</div>';
        }
        // add it all to the div with the offerings ID
        $('#offerings').html(buildGrid);
    }
</script>
