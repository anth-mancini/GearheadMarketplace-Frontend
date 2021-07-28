<?php
$url = "https://ct.soa-gw.canadapost.ca/rs/ship/price";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$cpKey = base64_encode("ed81d9146e37dc58:f54d3247e07b39d463b2eb");
$headers = array(
    "Accept: application/vnd.cpc.ship.rate-v4+xml",
    "Content-Type: application/vnd.cpc.ship.rate-v4+xml",
    "Authorization: Basic " . $cpKey,
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$data = <<<DATA
<mailing-scenario xmlns="http://www.canadapost.ca/ws/ship/rate-v4">
<customer-number>{$_POST["customerID"]}</customer-number>
<parcel-characteristics>
<weight>1</weight>
</parcel-characteristics>
<origin-postal-code>{$_POST["fromZIP"]}</origin-postal-code>
<destination>
<domestic>
<postal-code>{$_POST["toZIP"]}</postal-code>
</domestic>
</destination>
</mailing-scenario>
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//$xml = simplexml_load_string($xml_string);
$xml = simplexml_load_string($resp);
$json = json_encode($xml);
//    $array = json_decode($json);
//    var_dump($resp);
echo $json;