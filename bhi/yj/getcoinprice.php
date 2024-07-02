
<?php


include_once	"../lib/db.class.php";




# Define function endpoint
$ch = curl_init("https://api.xt.com/data/api/v1/getTicker?market=okna_usdt");
//	$ch = curl_init("https://eu.eth.chaingateway.io/v1/unsubscribeAddress");

# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# Send request.
$result = curl_exec($ch);
curl_close($ch);

# Decode the received JSON string
$resultdecoded = json_decode($result, true);
# Print status of request (should be true if it worked)


echo $resultdecoded["price"]."<br>";
$okna_usdt = $resultdecoded["price"];
$okna_c = $resultdecoded["rate"];

# Define function endpoint
$ch = curl_init("https://api.xt.com/data/api/v1/getTicker?market=btc_usdt");
//	$ch = curl_init("https://eu.eth.chaingateway.io/v1/unsubscribeAddress");

# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# Send request.
$result = curl_exec($ch);
curl_close($ch);

# Decode the received JSON string
$resultdecoded = json_decode($result, true);
# Print status of request (should be true if it worked)


echo $resultdecoded["price"]."<br>";
$btc_usdt = $resultdecoded["price"];
$btc_c = $resultdecoded["rate"];

# Define function endpoint
$ch = curl_init("https://api.xt.com/data/api/v1/getTicker?market=eth_usdt");
//	$ch = curl_init("https://eu.eth.chaingateway.io/v1/unsubscribeAddress");

# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# Send request.
$result = curl_exec($ch);
curl_close($ch);

# Decode the received JSON string
$resultdecoded = json_decode($result, true);
# Print status of request (should be true if it worked)


echo $resultdecoded["price"]."<br>";
$etc_usdt = $resultdecoded["price"];
$etc_c = $resultdecoded["rate"];

# Define function endpoint
$ch = curl_init("https://api.xt.com/data/api/v1/getTicker?market=xrp_usdt");
//	$ch = curl_init("https://eu.eth.chaingateway.io/v1/unsubscribeAddress");

# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# Send request.
$result = curl_exec($ch);
curl_close($ch);

# Decode the received JSON string
$resultdecoded = json_decode($result, true);
# Print status of request (should be true if it worked)


echo $resultdecoded["price"]."<br>";
$xrp_usdt = $resultdecoded["price"];
$xrp_c = $resultdecoded["rate"];



$DB_LP = new DBCLASS;

$mapQry = "UPDATE coinprice SET BTC = '$btc_usdt', BTC_S = '$btc_c', ETH = '$etc_usdt', ETH_S = '$etc_c', XRP = '$xrp_usdt', XRP_S = '$xrp_c',  OKNA = '$okna_usdt', OKNA_S = '$okna_c';";
$DB_LP->select($mapQry);

$DB_LP->close();
echo $mapQry;

?>
