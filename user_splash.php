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
<div id="offerings" class="container d-flex align-items-center justify-content-center text-center h-100" style="height: 100vh">
</div>
</body>
<?php include_once('footer.php'); ?>
</html>
<script>
    // let backendURL = 'http://0.0.0.0:8000/';
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    $(function() {
        // Handler for .ready() called.
        fetch(backendURL + 'offers/', {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            console.log(data)
            renderOffering(data,12)
        }).catch(error => {
            // console.log(error)
        })

    });
    $("button#page1").click(function (e) {
        e.preventDefault();
    });

    // Do something once the pages are clicked
    // $("button#page1").click(function (e) {
    //     e.preventDefault();
    //
    // });
    function renderOffering(data, max) {
        let maxCols = 6;
        let range = max;
        // x | x | x | x
        if (data.length < max)
            range = data.length;
        let numRows = Math.ceil(range / maxCols);
        let offerCount = 0;
        let buildGrid = '';
        for (let j = 0; j < numRows; j++) {
            buildGrid += '<div id="row' + (j + 1) + '" class="row">'
            for (let k = 0; k < maxCols; k++) {
                if (offerCount < range) {
                    let divPortion = '<div class="col">';
                    // blank image
                    // let imgPortion = '<img id=' + '"tag' + (offerCount + 1) + '" height="200" width="200" src="assets/images/blank.png" onclick="">';
                    //actual image from DB
                    let imgPortion = '<img id=' + '"tag' + (offerCount + 1) + '" height="200" width="200" src="' +
                        data[offerCount].images[0].link.replace(/\s/g, '+') + '" onclick="">';
                    let paraPortion = '<p id="p' + (offerCount + 1) + '">' + data[offerCount].title + '</p>';
                    let closingDivTag = '</div>';
                    buildGrid += divPortion + imgPortion + paraPortion + closingDivTag;
                    offerCount++;
                }
            }
            buildGrid += '</div>';
        }
        $('#offerings').html(buildGrid);
        // Way to do this with static html attr and change specific ids
        // for (let k = 0; k < range; k++) {
        // $('#tag' + (k + 1)).attr("src", data[k].images[0].link.replace(/\s/g, '+'));
        // $('#p' + (k + 1)).text(data[k].title)
        // }
    }
</script>
