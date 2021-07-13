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
    $("form#addOffer").submit(function (e) {
        e.preventDefault();
        let mailedBy = "2004381"; //customer ID
        let weight = "1";
        let originPostalCode = "H2B1A0";
        let postalCode = "K1K4T3";
        var text=`<mailing-scenario xmlns="http://www.canadapost.ca/ws/ship/rate-v4">
        <customer-number>${mailedBy}</customer-number>
        <parcel-characteristics>
        <weight>${weight}</weight>
        </parcel-characteristics>
        <origin-postal-code>${originPostalCode}</origin-postal-code>
        <destination>
          <domestic>
            <postal-code>${postalCode}</postal-code>
          </domestic>
        </destination>
      </mailing-scenario>`;
        // console.log(text);
        var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(text, "text/xml");
        console.log(xmlDoc);
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://ct.soa-gw.canadapost.ca/rs/ship/price')
        // xhr.open('GET', 'https://soa-gw.canadapost.ca/rs/ship/price')
        xhr.setRequestHeader('Accept', 'application/vnd.cpc.ship.rate-v4+xml');
        xhr.setRequestHeader('Content-Type', 'application/vnd.cpc.ship.rate-v4+xml');
        xhr.setRequestHeader('Authorization', 'Basic ' + btoa('ed81d9146e37dc58:f54d3247e07b39d463b2eb'));
        xhr.setRequestHeader('Accept-language', 'en-CA');
        xhr.send(text);
        // 4. This will be called after the response is received
        xhr.onload = function() {
            if (xhr.status != 200) { // analyze HTTP status of the response
                console.log(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found
            } else { // show the result
                console.log(`Done, got ${xhr.response.length} bytes`); // response is the server response
            }
        };

        xhr.onprogress = function(event) {
            if (event.lengthComputable) {
                console.log(`Received ${event.loaded} of ${event.total} bytes`);
            } else {
                console.log(`Received ${event.loaded} bytes`); // no Content-Length
            }

        };

        xhr.onerror = function() {
            console.log("Request failed");
        }
        // fetch('https://ct.soa-gw.canadapost.ca/rs/ship/price', {
        //     method: 'get',
        //     data: xmlDoc,
        //     headers: {
        //         Accept: 'application/vnd.cpc.ship.rate-v4+xml',
        //         ContentType: 'application/vnd.cpc.ship.rate-v4+xml',
        //         Authorization: 'Basic ' + btoa('ed81d9146e37dc58:f54d3247e07b39d463b2eb'),
        //         AcceptLanguage: 'en-CA'
        //     },
        // })
        //     .then(response => response.json()).then(data => {
        //         console.log(data)
        // }).catch(error => {
        //     console.log(error)
        // })
    });
    function renderOffering(data){

    }
</script>