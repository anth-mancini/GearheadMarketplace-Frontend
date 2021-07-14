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
                console.log("clicked");
                let data = {"customerID": "0009715261", "toZIP" : "K2B8J6", "fromZIP":"J0E1X0"};
                var ajaxurl = 'form.php';
                $.post(ajaxurl, data, function (response) {
                    // Response div goes here.
                    // var parser = new DOMParser();
                    // var xmlDoc = parser.parseFromString(response, "text/xml");
                    let json = JSON.stringify(JSON.parse(response));
                    json.forEach(function (obj){
                        console.log(obj);
                    })
                });
            });
</script>