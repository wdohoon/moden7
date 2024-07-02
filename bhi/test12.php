<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>



<?php

//이더리움
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

$blockSDK = new BlockSDK("BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM");


	$ethClient = $blockSDK->createEthereum();

	$address = $ethClient->getAddressBalance([
		"address" => "0x96c85d8961952f881fd22c8b60057003117553be"
	]);
	
	
	echo  $address['payload']['balance'];
	
	echo "<br>";
	
	echo  $address['state']['code'];
	
?>


</body>
</html>
