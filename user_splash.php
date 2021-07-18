<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GearHead Marketplace</title>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="css/user_splash.css">
</head>
<div id="offerings" class="container-fluid"
     style="text-align: center; background-color:darkorange">
</div>
<br>
<div style="text-align: center">
    <button class="btn btn-primary" id="page1">1</button>
    <button class="btn btn-primary" id="page2">2</button>
    <button class="btn btn-primary" id="page3">3</button>
    <button class="btn btn-primary" id="page4">4</button>
    <button class="btn btn-primary" id="page5">5</button>
</div>
</html>
<script>
    // let backendURL = 'http://0.0.0.0:8000/';
    let backendURL = 'https://backend-gearheadmarketplace.herokuapp.com/';
    $(function() {
        // get data once DOM ready
        fetch(backendURL + 'offers/', {
            method: 'get',
        })
            .then(response => response.json()).then(data => {
            renderOffering(data, 12)
        }).catch(error => {
            console.log(error)
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



