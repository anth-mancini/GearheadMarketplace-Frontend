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
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://www.canadapost.ca/ws/ship/rate-v4')
        xhr.send();

        // 4. This will be called after the response is received
        xhr.onload = function() {
            if (xhr.status != 200) { // analyze HTTP status of the response
                alert(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found
            } else { // show the result
                alert(`Done, got ${xhr.response.length} bytes`); // response is the server response
            }
        };

        xhr.onprogress = function(event) {
            if (event.lengthComputable) {
                alert(`Received ${event.loaded} of ${event.total} bytes`);
            } else {
                alert(`Received ${event.loaded} bytes`); // no Content-Length
            }

        };

        xhr.onerror = function() {
            alert("Request failed");
        }

    });
    function renderOffering(data){

    }
</script>