<?php

include_once	"../lib/db.class.php";

$DB_LP = new DBCLASS;


require_once 'vendor/autoload.php';
use BlockSDK;


$blockSDK = new BlockSDK("Iy5ZL1qnTEKX2OCITNMlBI2USFrMJC8SoJdEd8X2");
$ETHClient = $blockSDK->createEthereum();


for ( $i =0 ; $i < 500; $i++ )
{


	$address = $ETHClient->createAddress([
		"name" => $i
	]);

	print_r($address);


	$id = $address['payload']['id'];
	$name = $address['payload']['name'];
	$addr = $address['payload']['address'];
	$private_key = $address['payload']['private_key'];
	$datetime = $address['payload']['datetime'];
	$timestamp = $address['payload']['timestamp'];
	

	$mapQry = "INSERT INTO wallet VALUES ('0','$id','$name','0','$private_key','$datetime','$timestamp','0','0','$addr','0','0','0');";
	$DB_LP->select($mapQry);
		

	echo $mapQry;
}


$DB_LP->close();

?>
