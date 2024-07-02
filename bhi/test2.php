<?php
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

$blockSDK = new BlockSDK("BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM");


	$ethClient = $blockSDK->createEthereum();

	$address = $ethClient->createAddress([
		"name" => "test"
	]);
	
	
	echo  $address['payload']['address'];
	
	echo "<br>";
	
	echo  $address['payload']['private_key'];