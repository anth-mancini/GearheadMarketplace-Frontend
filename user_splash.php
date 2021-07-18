<?php

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GearHead Marketplace</title>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="css/user_splash.css">
</head>
<link rel="stylesheet" href="css/header.css">
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Gearhead Market Place</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="">Settings</a></li>
                        <li><a class="dropdown-item" href="">Logout</a></li>
                    </ul>
                </li>
                <a href="/testForms/offer-form-test.php">
                    <button class="btn btn-primary" action="">Create Listing</button>
                </a>
            </div>
        </div>
    </nav>
</header>
<body>
<div id="offerings">
    
</div>
</body>
</html>
<script>
    // let backendURL = 'http://0.0.0.0:8000/';
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    $("button#page1").click(function (e) {
        e.preventDefault();
        fetch(backendURL + 'offers/', {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            console.log(data)
            renderOffering(data,0,9)
        }).catch(error => {
            // console.log(error)
        })
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
