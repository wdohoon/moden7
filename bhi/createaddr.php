<?php


include_once	"./lib/db.class.php";

$DB_LP = new DBCLASS;


require_once './vendor/autoload.php';
use BlockSDK;



//$blockSDK = new BlockSDK("iHPg89hfHnJXG7noHiddBpMqHZvh2Lp6NjvTT49h");
$blockSDK = new BlockSDK("Iy5ZL1qnTEKX2OCITNMlBI2USFrMJC8SoJdEd8X2");


$btcClient = $blockSDK->createBitcoin();
print_r( $btcClient );
$ethClient = $blockSDK->createEthereum();
print_r( $ethClient );

//$blockchain = $btcClient->getBlockChain();


//for ( $i =0 ; $i < 100; $i++ )
{
	$wallet = $btcClient->createHdWallet([
		"name" => "oknawallet"
	]);
	print_r ( $wallet );

	/*
	$address = $ethClient->createAddress([
		"name" => "1"
	]);

	print_r ( $address );


	$id = $address['payload']['id'];
	$name = $address['payload']['name'];
	$addr = $address['payload']['address'];
	$private_key = $address['payload']['private_key'];
	$datetime = $address['payload']['datetime'];
	$timestamp = $address['payload']['timestamp'];
	

	$mapQry = "INSERT INTO ethaddr VALUES ('0','$id','$name','$addr','$private_key');";
	$DB_LP->select($mapQry);
		

	echo $mapQry;
	usleep(500); */
}


$DB_LP->close();

?>