<?php

$coin = $_GET['coin'];

$url="https://api.bybit.com"; #Testnet environment

$curl = curl_init();

$endpoint="/derivatives/v3/public/order-book/L2?symbol=".$coin."&limit=500";

curl_setopt_array($curl, array(
	CURLOPT_URL => $url . $endpoint,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_HTTPHEADER => array(
	  "X-BAPI-RECV-WINDOW: 5000",
	  "Content-Type: application/json"
	),
  ));
if($method=="GET")
{
  curl_setopt($curl, CURLOPT_HTTPGET, true);
}
$response = curl_exec($curl);

$data = json_decode( $response, true );

for ( $i = 0 ; $i < 150; $i++)
{
	echo $data['result']['b'][$i][0];
	echo "\r\n";
	echo $data['result']['b'][$i][1];
	echo "\r\n";

}

if ( $data['result']['b'][$i][0] == 0 )
{
	echo "99999";
	echo "\r\n";
	echo "99999";
	echo "\r\n";
}


for ( $i = 0 ; $i < 150; $i++)
{
	echo $data['result']['b'][$i][0];
	echo "\r\n";
	echo $data['result']['a'][$i][1];
	echo "\r\n";

}

curl_close($curl);

?>