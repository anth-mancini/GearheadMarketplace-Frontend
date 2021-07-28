<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Gear-Head Market Place </title>
    <!--    <link rel="stylesheet" href="../css/homepage.css">-->
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<form id="getShippingQuote" method="post">
    <div class="mb-3">
        <label class="form-label">Enter your postal code</label>
        <input class="form-control" type="text" name="fromZIP" value="J0E1X0"/>
    </div>
    <div class="mb-3">
        <label class="form-label">Enter destination postal code</label>
        <input class="form-control" type="text" name="toZIP" value="K2B8J6"/>
    </div>
    <button class="btn btn-primary">Get Shipping Quote!</button>
</form>
<h1>Canada Post Rates</h1>
<table id="userListingView" class="table table-sm">
    <thead>
    <tr>
        <th scope="col">Service Name</th>
        <th scope="col">Price</th>
        <th scope="col">Transit Time</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>
</body>
</html>
<script>
    $("form#getShippingQuote").submit(function (e) {
        e.preventDefault();
        let formData = $("form#getShippingQuote").serializeArray();
        var data = {};
        data['customerID'] = '0009715261';
        $(formData).each(function (index, obj) {
            data[obj.name] = obj.value;
        });
        $('#userListingView tbody').html('Loading...');
        // let data = {"customerID": "0009715261", "toZIP": "K2B8J6", "fromZIP": "J0E1X0"};
        var ajaxurl = 'canadapost_API.php';
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            // var parser = new DOMParser();
            // var xmlDoc = parser.parseFromString(response, "text/xml");
            let json = JSON.parse(response);
            let tableHTML = "";
            if (json['price-quote'] === undefined) {
                $('#userListingView tbody').html('failed to fetch data, check your postal codes');
            } else {
                for (let k = 0; k < json['price-quote'].length; k++) {
                    // console.log(json['price-quote'][k]['service-name']);
                    // console.log(json['price-quote'][k]['price-details'].due);
                    // console.log(json['price-quote'][k]['service-standard']['expected-transit-time']);
                    tableHTML += "<tr>";
                    tableHTML += "<td>" + json['price-quote'][k]['service-name'] + "</td>"
                    tableHTML += "<td>$" + json['price-quote'][k]['price-details'].due + "</td>"
                    tableHTML += "<td>" + json['price-quote'][k]['service-standard']['expected-transit-time'] + "</td>"
                    tableHTML += "</tr>"
                }
                $('#userListingView tbody').html(tableHTML);
            }
        });
    });
</script>